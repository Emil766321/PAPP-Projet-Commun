
<?php
// Liste d'éléments dynamiques (tu peux les personnaliser comme tu veux)
$articles = [
    ["title" => "Article 1", "description" => "Voici une description de l'article 1.", "image" => "https://via.placeholder.com/300x200?text=Article+1"],
    ["title" => "Article 2", "description" => "Voici une description de l'article 2.", "image" => "https://via.placeholder.com/300x200?text=Article+2"],
    ["title" => "Article 3", "description" => "Voici une description de l'article 3.", "image" => "https://via.placeholder.com/300x200?text=Article+3"],
];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Dynamique avec PHP, HTML et CSS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            width: 80%;
            max-width: 1200px;
        }

        .article {
            background-color: #fff;
            border: 2px solid #ddd;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .article:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .article img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .content {
            padding: 20px;
        }

        .content h2 {
            font-size: 1.5em;
            color: #333;
            margin: 0;
        }

        .content p {
            font-size: 1em;
            color: #666;
            margin: 10px 0 0;
        }

        .article-footer {
            background-color: #ff5733;
            color: #fff;
            padding: 10px;
            text-align: center;
            border-top: 2px solid #e44d2d;
            font-weight: bold;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <?php foreach ($articles as $article): ?>
            <div class="article">
                <img src="<?= $article['image'] ?>" alt="<?= htmlspecialchars($article['title']) ?>">
                <div class="content">
                    <h2><?= htmlspecialchars($article['title']) ?></h2>
                    <p><?= htmlspecialchars($article['description']) ?></p>
                </div>
                <div class="article-footer">
                    <a href="#">Lire plus...</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>





















