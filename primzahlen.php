<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Primzahlen, Logarithmus</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; }
        .container { display: flex; height: 100vh; }
        .panel { flex: 1; padding: 20px; box-sizing: border-box; overflow-y: auto; }
        .left-panel { border-right: 1px solid #ccc; }
        pre { background: #f5f5f5; padding: 10px; border-radius: 5px; white-space: pre-wrap; }
        .mono { font-family: "Courier New", monospace; }
        input { padding: 5px; width: 120px; }
        button { padding: 5px 10px; margin-top: 5px; cursor: pointer; display:block; }
    </style>
</head>
<body>

<div class="container">

    <!-- links primzahlen-->
    <div class="panel left-panel">
        <h2>Primzahlen bis zur eingegebenen Zahl</h2>

        <label for="primeLimit">Zahl eingeben:</label>
        <input type="number" id="primeLimit" min="2" value="50">
        <button onclick="zeigePrimzahlen()">Primzahlen berechnen</button>

        <h3>Ausgabe:</h3>
        <pre id="primeOutput"></pre>
    </div>

    <!-- rechts logarithmus -->
    <div class="panel">
        <h2>Logarithmus</h2>

        <label for="logLimit">Obergrenze für LOG-Kurve:</label>
        <input type="number" id="logLimit" min="1" value="100">
        <button onclick="zeigeLog()">Logarithmus anzeigen</button>

        <h3>Logarithmus-Kurve:</h3>
        <pre id="logOutput" class="mono"></pre>

        <hr>
    </div>

</div>

<script>
    function istPrim(num) {
        if (num < 2) return false;
        for (let i = 2; i <= num / 2; i++) {
            if (num % i === 0) return false;
        }
        return true;
    }

    function zeigePrimzahlen() {
        const limit = parseInt(document.getElementById("primeLimit").value);
        const out = document.getElementById("primeOutput");

        if (limit < 2) {
            out.textContent = "Bitte eine Zahl ab 2 eingeben.";
            return;
        }

        const result = [];
        for (let i = 2; i <= limit; i++) {
            if (istPrim(i)) result.push(i);
        }

        out.textContent = result.join(", ");
    }

    function zeigeLog() {
        const limit = parseInt(document.getElementById("logLimit").value);
        const out = document.getElementById("logOutput");

        let txt = "";
        const maxStars = 40;
        const maxLog = Math.log10(limit <= 1 ? 2 : limit);

        for (let i = 1; i <= limit; i++) {
            const logVal = Math.log10(i);
            const stars = Math.round((logVal / maxLog) * maxStars);
            txt += i.toString().padStart(3) + ": " + "*".repeat(stars) + "\n";
        }

        out.textContent = txt;
    }
</script>

</body>
</html>