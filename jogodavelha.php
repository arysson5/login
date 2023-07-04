<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Jogo da Velha</title>
    <style>
        h1 {
    text-align: center;
    background-color: #f2f2f2;
    padding: 10px;
}
        body {
            font-family: Arial, sans-serif;
        }

        .board {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(3, 1fr);
            gap: 10px;
            width: 300px;
            height: 300px;
            margin: 0 auto;
            border: 2px solid #333;
            border-radius: 5px;
            padding: 10px;
        }

        .cell {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            background-color: #f2f2f2;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .cell:hover {
            background-color: #ddd;
        }

        .cell.X {
            color: #f44336;
        }

        .cell.O {
            color: #2196f3;
        }

        .message {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>Jogo da Velha</h1>
    <div class="board">
        <div class="cell" onclick="makeMove(0, 0)"></div>
        <div class="cell" onclick="makeMove(0, 1)"></div>
        <div class="cell" onclick="makeMove(0, 2)"></div>
        <div class="cell" onclick="makeMove(1, 0)"></div>
        <div class="cell" onclick="makeMove(1, 1)"></div>
        <div class="cell" onclick="makeMove(1, 2)"></div>
        <div class="cell" onclick="makeMove(2, 0)"></div>
        <div class="cell" onclick="makeMove(2, 1)"></div>
        <div class="cell" onclick="makeMove(2, 2)"></div>
    </div>

    <div class="message" id="message"></div>
    <button onclick="resetGame()">Recomeçar Jogo</button>

    <script>
        var currentPlayer = "X";
        var board = [
            ["", "", ""],
            ["", "", ""],
            ["", "", ""]
        ];

        function makeMove(row, col) {
            if (board[row][col] === "") {
                board[row][col] = currentPlayer;
                document.getElementsByClassName("cell")[row * 3 + col].innerText = currentPlayer;
                document.getElementsByClassName("cell")[row * 3 + col].classList.add(currentPlayer);

                if (checkWin()) {
                    document.getElementById("message").innerText = "Jogador " + currentPlayer + " venceu!";
                    disableClicks();
                } else if (checkDraw()) {
                    document.getElementById("message").innerText = "Empate!";
                    disableClicks();
                } else {
                    currentPlayer = currentPlayer === "X" ? "O" : "X";
                }
            }
        }

        function checkWin() {
            // Verificar linhas
            for (var row = 0; row < 3; row++) {
                if (board[row][0] !== "" && board[row][0] === board[row][1] && board[row][1] === board[row][2]) {
                    return true;
                }
            }

            // Verificar colunas
            for (var col = 0; col < 3; col++) {
                if (board[0][col] !== "" && board[0][col] === board[1][col] && board[1][col] === board[2][col]) {
                    return true;
                }
            }

            // Verificar diagonais
            if (board[0][0] !== "" && board[0][0] === board[1][1] && board[1][1] === board[2][2]) {
                return true;
            }

            if (board[0][2] !== "" && board[0][2] === board[1][1] && board[1][1] === board[2][0]) {
                return true;
            }

            return false;
        }

        function checkDraw() {
            for (var row = 0; row < 3; row++) {
                for (var col = 0; col < 3; col++) {
                    if (board[row][col] === "") {
                        return false;
                    }
                }
            }
            return true;
        }

        function disableClicks() {
            var cells = document.getElementsByClassName("cell");
            for (var i = 0; i < cells.length; i++) {
                cells[i].onclick = null;
                cells[i].style.cursor = "default";
            }
        }

        function resetGame() {
    currentPlayer = "X";
    board = [
        ["", "", ""],
        ["", "", ""],
        ["", "", ""]
    ];

    var cells = document.getElementsByClassName("cell");
    for (var i = 0; i < cells.length; i++) {
        cells[i].innerText = "";
        cells[i].classList.remove("X", "O");
        cells[i].addEventListener("click", cellClickHandler);
    }

    document.getElementById("message").innerText = "";
}

    </script>
</body>
</html>
