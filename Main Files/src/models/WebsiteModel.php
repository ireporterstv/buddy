<?php

namespace spark\models;

/**
* UrlModel
*
*/
class WebsiteModel extends Model
{
    protected static $table = 'websites';

    protected $queryKey = 'id';

    protected $autoTimestamp = false;

    protected $sortRules = [
        'recently-searched' => ['updated_at' => 'DESC'],
        'newest'            => ['created_at' => 'DESC'],
        'oldest'            => ['created_at' => 'ASC'],
        'most-searched'     => ['cnt' => 'DESC'],
        'least-searched'    => ['cnt' => 'ASC'],
    ];

    public function addWebsite($data)
    {
        $time = time();

        if (empty($data['created_at'])) {
            $data['created_at'] = $time;
        }

        if (empty($data['updated_at'])) {
            $data['updated_at'] = $time;
        }


        $conn = mysqli_connect("localhost:3306", "root", "", "based");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $url_value = $data['urls'].rawurlencode($glyph);
        echo $url_value."<br>";


        $sql = "SELECT id, urls, cnt FROM based_websites WHERE urls='$url_value'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["sitename"]. "<br>";
                $id = $row['id'];
                $cnt = $row['cnt'] + 1;
                $sql = "UPDATE based_websites SET sitename='$cnt' WHERE id='$id'";
                if ($conn->query($sql) === TRUE) {
                    echo "Record Updated successfully".'\n';
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            echo $url_value."<br>";

        } else {
            $sql = "INSERT INTO based_websites (sitename, created_at, updated_at) VALUES ('$url_value', '1', '$time', '$time')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully".'\n';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        // if ($conn->connect_error) {
        //     die("Connection failed: " . $conn->connect_error);
        // }
        // $sql = "UPDATE MyGuests SET cnt='Doe' WHERE urls=$data->urls";
        $conn->close();
    }
}
