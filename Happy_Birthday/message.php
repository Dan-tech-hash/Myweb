<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Birthday!</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: "Poppins", sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #111, #1f1f1f, #292929);
            color: white;
            text-align: center;
            overflow: hidden;
            padding: 20px;
            position: relative;
        }
        .card {
            background: rgba(255, 255, 255, 0.05);
            padding: 30px 20px;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.8);
            width: 100%;
            max-width: 500px;
            z-index: 2; /* message ABOVE */
            position: relative;
        }
        h1 { color: #ff4081; font-size: 24px; margin-bottom: 20px; }
        p { font-size: 18px; line-height: 1.5; margin-top: 15px; opacity: 0; transition: opacity 1.5s ease-in; }
        .hidden { display: none; }
        button {
            margin-top: 15px;
            padding: 12px 20px;
            border: none;
            border-radius: 10px;
            background: #ff4081;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover { background: #e73370; }
        .typing {
            font-size: 16px;
            color: #aaa;
            margin-top: 10px;
            font-style: italic;
        }
        canvas {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            pointer-events: none;
            z-index: 1; /* confetti BELOW */
            opacity: 1;
            transition: opacity 2s ease-out;
        }
    </style>
</head>
<body>
    <canvas id="confetti"></canvas>
    <div class="card">
        <h1> Happy Birthday po </h1>
        <button id="openBtn" onclick="showMessage()">💌 Tap to open your message</button>
        <div id="typing" class="typing hidden">...typing</div>
        <p id="message" class="hidden"></p>
    </div>

    <script>
        function showMessage() {
            const btn = document.getElementById("openBtn");
            btn.style.display = "none"; 

            const typing = document.getElementById("typing");
            typing.classList.remove("hidden");

            setTimeout(() => {
                typing.classList.add("hidden");
                const msg = "Another year, another achievement in your life. You truly deserve all the happiness because I know how hard you’ve worked. For sure, your family is so proud of you—and me too, I’m so happy for you today. 💖";
                let i = 0;
                const textBox = document.getElementById("message");
                textBox.classList.remove("hidden");
                textBox.innerHTML = "";
                textBox.style.opacity = "1";

                const typeWriter = setInterval(() => {
                    if (i < msg.length) {
                        textBox.innerHTML += msg.charAt(i);
                        i++;
                    } else {
                        clearInterval(typeWriter);
                    }
                }, 50);

                // Stop confetti after 5s
                setTimeout(() => {
                    document.getElementById("confetti").style.opacity = "0";
                }, 5000);

            }, 2000);
        }

        // 🎊 Confetti Setup 🎊
        const canvas = document.getElementById("confetti");
        const ctx = canvas.getContext("2d");
        let confettiPieces = [];

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        window.addEventListener("resize", resizeCanvas);
        resizeCanvas();

        class ConfettiPiece {
            constructor() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * canvas.height - canvas.height;
                this.size = Math.random() * 5 + 3; // smaller size
                this.color = ["#ff4081", "#ffffff", "#bbbbbb", "#000000"][Math.floor(Math.random() * 4)];
                this.speed = Math.random() * 1 + 0.5; // slower fall
                this.rotation = Math.random() * 360;
                this.rotationSpeed = Math.random() * 2 - 1;
            }
            draw() {
                ctx.save();
                ctx.translate(this.x, this.y);
                ctx.rotate(this.rotation * Math.PI / 180);
                ctx.fillStyle = this.color;
                ctx.fillRect(-this.size / 2, -this.size / 2, this.size, this.size);
                ctx.restore();
            }
            update() {
                this.y += this.speed;
                this.rotation += this.rotationSpeed;
                if (this.y > canvas.height) {
                    this.y = -10;
                    this.x = Math.random() * canvas.width;
                }
            }
        }

        function initConfetti() {
            confettiPieces = [];
            for (let i = 0; i < 40; i++) { // fewer pieces
                confettiPieces.push(new ConfettiPiece());
            }
        }

        function animateConfetti() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            confettiPieces.forEach(p => {
                p.update();
                p.draw();
            });
            requestAnimationFrame(animateConfetti);
        }

        initConfetti();
        animateConfetti();
    </script>
</body>
</html>
