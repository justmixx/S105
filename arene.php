<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="website icon" type="svg" href="img/logo.svg">
    <link rel="stylesheet" href="css/arene.css">
    <title>Arène - combat de mouche</title>
</head>
<body>
    <header>
        <?php include('include/header.php'); ?>
    </header>

    <h1 class="title">Arène de combat</h1>

    <!-- Encadré pour les points de vie -->
    <div id="fly-info-container" style="background-color: #f8f9fa; border: 1px solid #ccc; padding: 10px; text-align: center; margin-bottom: 20px;">
        <div id="fly-info" style="display: flex; justify-content: space-around; align-items: center;"></div>
    </div>

    <canvas id="battlefield" width="800" height="600"></canvas>

    <script>
        const canvas = document.getElementById('battlefield');
        const ctx = canvas.getContext('2d');

        // Conteneur pour les informations des mouches
        const flyInfoContainer = document.getElementById('fly-info');

        // Liste des images des mouches
        const flyImages = [
            'img/logo.svg',
            'img/logo.svg',
            'img/logo.svg',
            'img/logo.svg'
        ];

        // Paramètres communs
        const speed = 3;
        const swordLength = 50;

        class Fly {
            constructor(x, y, color, name) {
                this.x = x;
                this.y = y;
                this.baseSize = 60; // Taille de base
                this.size = this.baseSize;
                this.speed = speed;
                this.directionX = Math.random() * 2 - 1;
                this.directionY = Math.random() * 2 - 1;
                this.hp = 100;
                this.color = color;
                this.name = name;

                // Image aléatoire pour chaque mouche
                this.image = new Image();
                this.image.src = flyImages[Math.floor(Math.random() * flyImages.length)];

                const magnitude = Math.sqrt(this.directionX ** 2 + this.directionY ** 2);
                this.directionX /= magnitude;
                this.directionY /= magnitude;
            }

            draw() {
                this.size = Math.max(this.baseSize / 2, (this.hp / 100) * this.baseSize);

                ctx.drawImage(this.image, this.x - this.size / 2, this.y - this.size / 2, this.size, this.size);

                const swordX = this.x + swordLength * this.directionX;
                const swordY = this.y + swordLength * this.directionY;

                ctx.beginPath();
                ctx.moveTo(this.x, this.y);
                ctx.lineTo(swordX, swordY);
                ctx.strokeStyle = this.color;
                ctx.lineWidth = 3;
                ctx.stroke();
            }


            move() {
                this.x += this.directionX * this.speed;
                this.y += this.directionY * this.speed;

                if (this.x <= this.size / 2 || this.x >= canvas.width - this.size / 2) {
                    this.directionX *= -1;
                }
                if (this.y <= this.size / 2 || this.y >= canvas.height - this.size / 2) {
                    this.directionY *= -1;
                }
            }

            checkCollision(other) {
                const dx = this.x - other.x;
                const dy = this.y - other.y;
                const distance = Math.sqrt(dx * dx + dy * dy);

                if (distance < this.size) {
                    this.directionX *= -1;
                    this.directionY *= -1;
                    other.directionX *= -1;
                    other.directionY *= -1;
                }

                const swordTipX = this.x + swordLength * this.directionX;
                const swordTipY = this.y + swordLength * this.directionY;

                const swordDx = swordTipX - other.x;
                const swordDy = swordTipY - other.y;
                const swordDistance = Math.sqrt(swordDx * swordDx + swordDy * swordDy);

                if (swordDistance < other.size / 2) {
                    other.hp -= 5;
                    this.directionX *= -1;
                    this.directionY *= -1;
                }
            }
        }

        const flies = [
            new Fly(200, 200, 'red', 'Mouche Rouge'),
            new Fly(600, 400, 'blue', 'Mouche Bleue'),
            new Fly(300, 100, 'green', 'Mouche Verte'),
            new Fly(500, 500, 'purple', 'Mouche Violette'),
        ];

        function updateFlyInfo() {
            flyInfoContainer.innerHTML = flies
                .map(fly => `<div style="padding: 5px; border: 1px solid #ddd; border-radius: 5px;">
                                <strong>${fly.name}</strong>: ${fly.hp} HP
                             </div>`)
                .join('');
        }

        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            flies.forEach(fly => {
                if (fly.hp > 0) { // Seules les mouches vivantes bougent et dessinent
                    fly.move();
                    fly.draw();
                }
            });

            for (let i = 0; i < flies.length; i++) {
                for (let j = 0; j < flies.length; j++) {
                    if (i !== j) {
                        flies[i].checkCollision(flies[j]);
                    }
                }
            }

            updateFlyInfo();

            // Vérifier combien de mouches restent vivantes
            const aliveFlies = flies.filter(fly => fly.hp > 0);

            if (aliveFlies.length === 1) {
                const winner = aliveFlies[0];
                flyInfoContainer.innerHTML += `
                    <div style="color: green;">
                        <strong>Combat terminé !</strong> Le gagnant est <strong>${winner.name}</strong> avec ${winner.hp} HP restants !
                    </div>`;
                return; // Arrêter l'animation
            }

            requestAnimationFrame(animate);
        }

        animate();
    </script>

    <footer>
        <?php include('include/footer.php'); ?>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const burger = document.querySelector('.burger');
            const navLinks = document.querySelector('.nav-links');

            burger.addEventListener('click', () => {
                navLinks.classList.toggle('active');
            });
        });
    </script>
</body>
</html>
