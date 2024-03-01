<?php

// Include config file
require_once  "../../../admin/php/login/config/config.php";

// Fetch offers from the database
$query = "
    SELECT
        pt.plateId,
        pt.itemName,
        pt.description,
        pt.price,
        pt.image,
        c.id AS categoryId,
        c.categoryName,
        c.CategoryImage
    FROM
        categories c
    LEFT JOIN
        plates_table pt ON c.id = pt.category_id
    WHERE
        c.language_id = 2
";
$result = $mysql_db->query($query);

// Check if the query was successful
if (!$result) {
    die("Error fetching offers: " . $mysql_db->error);
}

// Initialize menu array
$menu = array();

// Fetch data and convert to JSON
while ($row = $result->fetch_assoc()) {
    $categoryId = $row['categoryId'];

    // Check if the category already exists in $menu
    if (!isset($menu[$categoryId])) {
        $menu[$categoryId] = array(
            'categoryId' => $categoryId,
            'categoryName' => $row['categoryName'],
            'CategoryImage' => $row['CategoryImage'],
            'items' => array(),
        );
    }

    // Check if the plate data is not null (i.e., the category has plates)
    if ($row['plateId'] !== null) {
        // Add the item to the category
        $menuItem = array(
            'plateId' => $row['plateId'],
            'itemName' => $row['itemName'],
            'price' => $row['price'],
            'image' => $row['image'],
            'description' => $row['description'] !== null ? $row['description'] : null,
        );
        $menu[$categoryId]['items'][] = $menuItem;
    }
}

// Set headers to indicate JSON content
header('Content-Type: application/json');

// Output JSON response
echo json_encode(['menu' => array_values($menu)]);

// Close the database connection
$mysql_db->close();

?>