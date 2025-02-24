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

    <!-- Sélecteur du nombre de mouches -->
    <div id="fly-count-container" style="text-align: center; margin-bottom: 20px;">
        <label for="fly-count">Choisissez le nombre de mouches :</label>
        <select id="fly-count" name="fly-count">
            <option value="2">2 Mouches</option>
            <option value="3">3 Mouches</option>
            <option value="4">4 Mouches</option>
            <option value="5">5 Mouches</option>
            <option value="6">6 Mouches</option>
            <option value="7">7 Mouches</option>
            <option value="8">8 Mouches</option>
            <option value="9">9 Mouches</option>
            <option value="10">10 Mouches</option>
        </select>
    </div>

    <!-- Encadré pour les points de vie -->
    <div id="fly-info-container" style="background-color: #f8f9fa; border: 1px solid #ccc; padding: 10px; text-align: center; margin-bottom: 20px;">
        <div id="fly-info" style="display: flex; justify-content: space-around; align-items: center;"></div>
    </div>

    <canvas id="battlefield" width="800" height="600"></canvas>

    <!-- Affichage des crédits et des paris -->
    <div style="text-align: center; margin-top: 20px;">
        <p>Crédits disponibles: <span id="credits">10</span></p>
        <p>Faites votre pari (avant que les mouche n'atteigne 50 HP):</p>
        <form id="bet-form">
            <label for="bet-mouche">Choisissez votre mouche:</label>
            <select id="bet-mouche"></select>
            <br>
            <label for="bet-amount">Montant du pari:</label>
            <input type="number" id="bet-amount" min="1" value="1">
            <br>
            <button type="submit" class="boutton">Parier</button>
        </form>
        <p id="bet-status"></p>
    </div>

    <script>
        const canvas = document.getElementById('battlefield');
        const ctx = canvas.getContext('2d');

        // Conteneur pour les informations des mouches
        const flyInfoContainer = document.getElementById('fly-info');

        // Monnaie virtuelle et pari
        let credits = 10;
        let betPlaced = false;
        let selectedFlyIndex = null;
        let betAmount = 0;
        let numFlies = 4; // Nombre initial de mouches

        // Liste des images des mouches
        const flyImages = [
            'img/logo.svg',
            'img/logo.svg',
            'img/logo.svg',
            'img/logo.svg',
            'img/logo.svg',
            'img/logo.svg',
            'img/logo.svg',
            'img/logo.svg',
            'img/logo.svg',
            'img/logo.svg'
        ];

        // Paramètres communs
        const speed = 3;
        const swordLength = 50;

        // Classe des mouches
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
                if (this.hp <= 0) return;

                // Calculer la taille en fonction des HP, avec une limite minimale à la moitié de la taille de base
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
                if (this.hp <= 0) return;

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
                if (this.hp <= 0 || other.hp <= 0) return;

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

        // Crée les mouches
        function createFlies() {
            flies = [];
            const flyNames = ['Mouche Rouge', 'Mouche Bleue', 'Mouche Verte', 'Mouche Violette', 'Mouche Jaune', 'Mouche Orange', 'Mouche Rose', 'Mouche Turquoise', 'Mouche Cyan', 'Mouche Magenta'];
            const flyColors = ['red', 'blue', 'green', 'purple', 'yellow', 'orange', 'pink', 'cyan', 'aqua', 'magenta'];

            for (let i = 0; i < numFlies; i++) {
                flies.push(new Fly(Math.random() * canvas.width, Math.random() * canvas.height, flyColors[i], flyNames[i]));
            }
            updateBetForm(); // Met à jour la liste des mouches sur le formulaire de pari
        }

        // Mise à jour du formulaire de pari pour afficher les mouches disponibles
        function updateBetForm() {
            const betMoucheSelect = document.getElementById('bet-mouche');
            betMoucheSelect.innerHTML = '';

            // Crée les options de mouches en fonction du nombre de mouches disponibles
            flies.forEach((fly, index) => {
                const option = document.createElement('option');
                option.value = index;
                option.textContent = fly.name;
                betMoucheSelect.appendChild(option);
            });
        }

        // Mise à jour des informations sur les mouches
        function updateFlyInfo() {
            flyInfoContainer.innerHTML = flies
                .filter(fly => fly.hp > 0)
                .map(fly => `<div style="padding: 5px; border: 1px solid #ddd; border-radius: 5px;">
                                <strong>${fly.name}</strong>: ${fly.hp} HP
                             </div>`)
                .join('');
        }

        // Animations du combat
        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            flies.forEach(fly => {
                fly.move();
                fly.draw();
            });

            for (let i = 0; i < flies.length; i++) {
                for (let j = 0; j < flies.length; j++) {
                    if (i !== j) {
                        flies[i].checkCollision(flies[j]);
                    }
                }
            }

            updateFlyInfo();

            const aliveFlies = flies.filter(fly => fly.hp > 0);
            if (aliveFlies.length === 1) {
                const winner = aliveFlies[0];
                if (betPlaced && selectedFlyIndex !== null) {
                    const betWinner = flies[selectedFlyIndex];
                    const multiplier = numFlies === 2 ? 1 :
                                      numFlies === 3 ? 1.5 :
                                      numFlies === 4 ? 2 :
                                      numFlies === 5 ? 2.5 :
                                      numFlies === 6 ? 3 :
                                      numFlies === 7 ? 3.5 :
                                      numFlies === 8 ? 4 :
                                      numFlies === 9 ? 4.5 : 5;
                    const message = (betWinner === winner)
                        ? `Vous avez gagné votre pari! +${Math.round(betAmount * multiplier)} crédits!`
                        : 'Vous avez perdu votre pari.';
                    credits += (betWinner === winner) ? Math.round(betAmount * multiplier) : 0;
                    document.getElementById('bet-status').innerHTML = message;
                    document.getElementById('credits').textContent = credits;
                }
                flyInfoContainer.innerHTML += `
                    <div style="color: green;">
                        <strong>Combat terminé !</strong> Le gagnant est <strong>${winner.name}</strong> avec ${winner.hp} HP restants !
                    </div>`;
                return;
            }

            requestAnimationFrame(animate);
        }

        // Mise à jour du nombre de mouches en fonction du sélecteur
        document.getElementById('fly-count').addEventListener('change', function () {
            numFlies = parseInt(this.value);
            createFlies();
            betPlaced = false;
            document.getElementById('bet-status').textContent = '';
            animate();
        });

        // Initialisation du combat et des mouches
        createFlies();

        // Formulaire de paris
        document.getElementById('bet-form').addEventListener('submit', (event) => {
            event.preventDefault();
            if (betPlaced) return;
            selectedFlyIndex = parseInt(document.getElementById('bet-mouche').value);
            betAmount = parseInt(document.getElementById('bet-amount').value);

            if (betAmount > credits) {
                document.getElementById('bet-status').textContent = 'Pas assez de crédits pour ce pari.';
                return;
            }

            credits -= betAmount;
            document.getElementById('credits').textContent = credits;
            document.getElementById('bet-status').textContent = `Vous avez parié ${betAmount} crédits sur ${flies[selectedFlyIndex].name}.`;
        });

        animate();
    </script>

    <footer>
        <?php include('include/footer.php'); ?>
    </footer>
</body>
</html>
