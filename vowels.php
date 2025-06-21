<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Vowel Detector</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 50px;
            text-align: center;
        }

        form {
            background: white;
            padding: 30px;
            display: inline-block;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        input[type="text"] {
            width: 300px;
            padding: 10px;
            font-size: 16px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            margin-top: 10px;
            font-size: 16px;
            background-color: #007bff;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .result {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }
    </style>
</head>

<body>

    <h1>Vowel Detector</h1>
    <form method="post">
        <input type="text" name="text" placeholder="Enter your text here" required>
        <br>
        <input type="submit" value="Detect Vowels">
    </form>

    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['text'];
        $vowels = ['a', 'e', 'i', 'o', 'u'];
        $count = 0;
        $highlighted = '';

        for ($i = 0; $i < strlen($input); $i++) {
            $char = $input[$i];
            if (in_array(strtolower($char), $vowels)) {
                $highlighted .= '<span class="vowel">' . htmlspecialchars($char) . '</span>';
                $count++;
            } else {
                $highlighted .= htmlspecialchars($char);
            }
        }

        echo "<div class='result'>";
        echo "Processed Text: <br><strong>$highlighted</strong><br>";
        echo "Total Vowels: <strong>$count</strong>";
        echo "</div>";
    }
    ?>
</body>

</html>