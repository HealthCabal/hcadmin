<?php
class fetchData
{
    public function fetchAuthorsDropdown($conn)
    {
        $fetchPeople = "SELECT * FROM hc_users";
        $getData = $conn->query($fetchPeople);
        while ($authorInfo = $getData->fetch_object()) {
            echo "<option value'".$authorInfo->ID."'>" . $authorInfo->user_fname. " ".$authorInfo->user_lname."</option>";
        }
    }


    public function fetchParentCategories($conn)
    {
        $fetchCats = "SELECT * FROM hc_categories";
        $getData = $conn->query($fetchCats);
        while ($catInfo = $getData->fetch_object()) {
            echo "<option value'".$catInfo->ID."'>" . $catInfo->cat_name."</option>";
        }
    }

    public function fetchChildCategories($conn)
    {
        $fetchCats = "SELECT * FROM hc_child_cats";
        $getData = $conn->query($fetchCats);
        while ($catInfo = $getData->fetch_object()) {
            echo "<option value'".$catInfo->ID."'>" . $catInfo->cat_name."</option>";
        }
    }


    public function fetchSeries($conn)
    {
        $fetchSeries = "SELECT * FROM hc_series";
        $getData = $conn->query($fetchSeries);
        echo "<option value='0'>Not part of a series</option>";
        while ($seriesInfo = $getData->fetch_object()) {
            echo "<option value'".$seriesInfo->ID."'>" . $seriesInfo->series_title."</option>";
        }
    }
}
$dataLoad = new fetchData();
