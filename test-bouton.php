<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bouton qui suit le curseur</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .section {
            position: relative;
            width: 100%;
            height: 100vh;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .button {
            position: absolute;
            padding: 10px 20px;
            font-size: 1.2rem;
            background-color: #4D59D6;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            transform: translate(-50%, -50%);
            transition: background-color 0.2s ease;
        }

        .button:hover {
            background-color: #3b47b2;
        }
    </style>
</head>
<body>
    <div class="section" id="trackingSection">
        <button class="button" id="followButton">Suivez-moi</button>
    </div>

    <script>
        const section = document.getElementById('trackingSection');
        const button = document.getElementById('followButton');

        section.addEventListener('mousemove', (e) => {
            const rect = section.getBoundingClientRect(); // Obtient les limites de la section
            const x = e.clientX - rect.left; // Position X relative à la section
            const y = e.clientY - rect.top;  // Position Y relative à la section

            button.style.left = `${x}px`;
            button.style.top = `${y}px`;
        });

        section.addEventListener('mouseleave', () => {
            button.style.left = '50%';
            button.style.top = '50%';
        });
    </script>
</body>
</html>