<?php

namespace spark\controllers\Dashboard;

use Valitron\Validator;
use spark\controllers\Controller;
use spark\drivers\Nav\Pagination;
use spark\models\QueryModel;
use spark\models\UrlModel;

/**
* DashboardUrlController
*
* @package spark
*/
class DashboardUrlsController extends DashboardController
{
    public function __construct()
    {
        parent::__construct();

        if (!current_user_can('manage_engines')) {
            sp_not_permitted();
        }

        breadcrumb_add('dashboard.queries', __('Queries'), url_for('dashboard.queries'));
        view_set('urls__active', 'active');
    }

    /**
     * List entries
     *
     * @return
     */
    public function index()
    {

        $app = app();

        // Model instance
        $urlModel = new UrlModel;

        // Current page number
        $currentPage = (int) $app->request->get('page', 1);

        // Items per page
        $itemsPerPage = (int) config('dashboard.items_per_page');

        // Total item count
        $totalCount = $urlModel->countRows();

        // Sort value
        $sort = $app->request->get('sort', null);

        // Ensure the target sort type is allowed
        if (!$urlModel->isSortAllowed($sort)) {
            $sort = 'recently-searched';
        }

        $sortRules = $urlModel->getAllowedSorting();

        // Filters
        $filters = [
            'sort' => e_attr($sort)
        ];

        $queryStr = request_build_query(['page', 'sort']);
        // Pagination instance
        $pagination = new Pagination($totalCount, $currentPage, $itemsPerPage);
        $pagination->setUrl("?page=@id@&sort={$sort}{$queryStr}");

        // Generated HTML
        $paginationHtml = $pagination->renderHtml();

        // Offset value based on current page
        $offset = $pagination->offset();

        // List entries
        $entries = $urlModel->readMany(
            ['*'],
            $offset,
            $itemsPerPage,
            $filters
        );

        // Template data
        $data = [
            'list_entries'    => $entries,
            'total_items'     => $totalCount,
            'offset'          => $offset === 0 ? 1 : $offset,
            'current_page'    => $currentPage,
            'items_per_page'  => $itemsPerPage,
            'current_items'   => $itemsPerPage * $currentPage,
            'sort_type'       => $sort,
            'pagination_html' => $paginationHtml,
            'sorting_rules'   => $sortRules,
            'query_str'       => $queryStr
        ];
        return view('admin::urls/index.php', $data);
    }
}
