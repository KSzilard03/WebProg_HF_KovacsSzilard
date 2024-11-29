<?php

$json = '[
    {
        "title": "The Catcher in the Rye",
        "author": "J.D. Salinger",
        "publication_year": 1951,
        "category": "Fiction"
    },
    {
        "title": "To Kill a Mockingbird",
        "author": "Harper Lee",
        "publication_year": 1960,
        "category": "Fiction"
    },
    {
        "title": "1984",
        "author": "George Orwell",
        "publication_year": 1949,
        "category": "Dystopian"
    },
    {
        "title": "The Great Gatsby",
        "author": "F. Scott Fitzgerald",
        "publication_year": 1925,
        "category": "Fiction"
    },
    {
        "title": "Brave New World",
        "author": "Aldous Huxley",
        "publication_year": 1932,
        "category": "Dystopian"
    }
]';

$array = json_decode($json, true);

$sortedArrayByCategory = [];

foreach ($array as $book) {
    $sortedArrayByCategory[$book['category']][] = $book;
}

echo "<table border='1' cellpadding='5' cellspacing='0'>";

echo "<tr>";
foreach ($sortedArrayByCategory as $category => $books) {
    echo "<th>$category</th>";
}
echo "</tr>";

$maxBooks = max(array_map('count', $sortedArrayByCategory));

for ($i = 0; $i <= $maxBooks; $i++) {
    echo "<tr>";
    foreach ($sortedArrayByCategory as $category => $books) {
        if (isset($books[$i])) {
            echo "<td>" . $books[$i]['title'] . "<br>" . $books[$i]['author'] . "<br>" . $books[$i]['publication_year'] . "</td>";
        } else {
            echo "<td></td>";
        }
    }
    echo "</tr>";
}

echo "</table>";

?>