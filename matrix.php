<!DOCTYPE html>
<html>
<head>
    <title>Matrix Printing with Color and Size Options</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
        th {
            background-color: lightgray;
        }
    </style>
</head>
<body>
    <?php
    // Function to generate the matrix
    function generateMatrix($numColors, $numSizes, $colorLabels, $sizeLabels)
    {
        $matrix = array();
        for ($i = 0; $i < $numColors; $i++) {
            $row = array();
            for ($j = 0; $j < $numSizes; $j++) {
                $cell = range(0, 10);
                $row[] = $cell;
            }
            $matrix[] = $row;
        }

        // Print the matrix
        echo "<table>";
        echo "<tr><th></th>";
        foreach ($sizeLabels as $sizeLabel) {
            echo "<th>$sizeLabel</th>";
        }
        echo "</tr>";
        for ($i = 0; $i < $numColors; $i++) {
            echo "<tr><th>$colorLabels[$i]</th>";
            for ($j = 0; $j < $numSizes; $j++) {
                echo "<td>";
                foreach ($matrix[$i][$j] as $value) {
                    echo "$value ";
                }
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numColors = $_POST["num_colors"];
        $numSizes = $_POST["num_sizes"];
        $colorLabels = explode(",", $_POST["color_labels"]);
        $sizeLabels = explode(",", $_POST["size_labels"]);

        // Validate input
        if ($numColors > 0 && $numSizes > 0 && count($colorLabels) == $numColors && count($sizeLabels) == $numSizes) {
            generateMatrix($numColors, $numSizes, $colorLabels, $sizeLabels);
        } else {
            echo "Invalid input. Please provide correct values.";
        }
    }
    ?>
</body>
</html>
