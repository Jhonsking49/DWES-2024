<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Científica PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .calculadora {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="number"], select {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #218838;
        }

        h3 {
            margin-top: 20px;
            color: #333;
        }

        .error {
            color: red;
        }

    </style>
</head>
<body>

    <h2>Calculadora Científica en PHP</h2>
    
    <form method="POST">
        <input type="number" step="any" name="numero1" placeholder="Primer número" required>
        <select name="operacion">
            <option value="sumar">Sumar</option>
            <option value="restar">Restar</option>
            <option value="multiplicar">Multiplicar</option>
            <option value="dividir">Dividir</option>
            <option value="potencia">Potencia (X^Y)</option>
            <option value="raizCuadrada">Raíz Cuadrada (√X)</option>
            <option value="logaritmo">Logaritmo (log(X))</option>
            <option value="seno">Seno (sin(X))</option>
            <option value="coseno">Coseno (cos(X))</option>
            <option value="tangente">Tangente (tan(X))</option>
        </select>
        <input type="number" step="any" name="numero2" placeholder="Segundo número (si aplica)">
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero1 = $_POST['numero1'];
        $numero2 = isset($_POST['numero2']) ? $_POST['numero2'] : null;
        $operacion = $_POST['operacion'];
        $resultado = 0;

        // Verificamos la operación seleccionada
        if ($operacion == 'sumar') {
            $resultado = $numero1 + $numero2;
            echo "<h3>Resultado: $numero1 + $numero2 = $resultado</h3>";
        } elseif ($operacion == 'restar') {
            $resultado = $numero1 - $numero2;
            echo "<h3>Resultado: $numero1 - $numero2 = $resultado</h3>";
        } elseif ($operacion == 'multiplicar') {
            $resultado = $numero1 * $numero2;
            echo "<h3>Resultado: $numero1 * $numero2 = $resultado</h3>";
        } elseif ($operacion == 'dividir') {
            if ($numero2 != 0) {
                $resultado = $numero1 / $numero2;
                echo "<h3>Resultado: $numero1 / $numero2 = $resultado</h3>";
            } else {
                echo "<h3>Error: No se puede dividir entre cero</h3>";
            }
        } elseif ($operacion == 'potencia') {
            $resultado = pow($numero1, $numero2);
            echo "<h3>Resultado: $numero1 ^ $numero2 = $resultado</h3>";
        } elseif ($operacion == 'raizCuadrada') {
            if ($numero1 >= 0) {
                $resultado = sqrt($numero1);
                echo "<h3>Resultado: √$numero1 = $resultado</h3>";
            } else {
                echo "<h3>Error: No se puede calcular la raíz cuadrada de un número negativo</h3>";
            }
        } elseif ($operacion == 'logaritmo') {
            if ($numero1 > 0) {
                $resultado = log($numero1);
                echo "<h3>Resultado: log($numero1) = $resultado</h3>";
            } else {
                echo "<h3>Error: No se puede calcular el logaritmo de un número no positivo</h3>";
            }
        } elseif ($operacion == 'seno') {
            $resultado = sin(deg2rad($numero1));
            echo "<h3>Resultado: sin($numero1°) = $resultado</h3>";
        } elseif ($operacion == 'coseno') {
            $resultado = cos(deg2rad($numero1));
            echo "<h3>Resultado: cos($numero1°) = $resultado</h3>";
        } elseif ($operacion == 'tangente') {
            $resultado = tan(deg2rad($numero1));
            echo "<h3>Resultado: tan($numero1°) = $resultado</h3>";
        } else {
            echo "<h3>Operación no válida</h3>";
        }
    }
    ?>

</body>
</html>
