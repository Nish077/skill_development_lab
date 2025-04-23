<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inheritance</title>
</head>

<body>
    <h2>Select the shape you want to calculate the area of:</h2>
    <form method="post" action="">
        <input type="radio" name="shape" value="rectangle" onclick="showInput()">Select for rectangle
        <br>

        <input type="radio" name="shape" value="square" onclick="showInput()">Select for Square
        <br>
        <input type="radio" name="shape" value="circle" onclick="showInput()">Select for circle
        <br>

        <div id="rectangleInput" style="display: none">
            <label for="length">Enter length</label>
            <input type="number" name="length">
            <label for="breadth">Enter breadth</label>
            <input type="number" name="breadth">
        </div>
        <br>
        <div id="squareInput" style="display: none">
            <label for="side">Enter side</label>
            <input type="number" name="side">
        </div>
        <br>
        <div id="circleInput" style="display: none">
            <label for="radius">Enter Radius</label>
            <input type="number" name="radius">
        </div>
        <br>
        <input type="submit" name="submit" value="calculateArea">


    </form>

    <?php
    class Shapes
    {
        public function area(): float
        {
            return 0;
        }

    }

    class Rectangle extends Shapes
    {
        private $l, $b;

        public function __construct($l, $b)
        {
            $this->l = $l;
            $this->b = $b;
        }
        public function area(): float
        {
            return $this->l * $this->b;
        }
    }
    class Square extends Shapes
    {
        private $side;

        public function __construct($s)
        {
            $this->side = $s;
        }
        public function area(): float
        {
            return $this->side * $this->side;
        }
    }
    class Circle extends Shapes
    {
        private $radius;

        public function __construct($r)
        {
            $this->radius = $r;
        }

        public function area(): float
        {
            return pi() * $this->radius * $this->radius;
        }
    }


    if (isset($_POST['submit'])) {
        $shape = $_POST['shape'];

        switch ($shape) {
            case 'rectangle':
                $l = $_POST['length'];
                $b = $_POST['breadth'];

                $selected = new Rectangle($l, $b);
                break;
            case 'square':
                $side = $_POST['side'];
                $selected = new Square($side);
                break;
            case 'circle':
                $rad = $_POST['radius'];
                $selected = new Circle($rad);
                break;
            default:
                $selected = null;
                break;
        }

        if ($selected) {
            echo "  <h3>Selected shape is " . ucfirst($shape) . "</h3>";
            echo "<span>Area is " . number_format($selected->area(), 2) . "</span>";

        }
    }
    ?>

    <script>
        function showInput() {
            document.getElementById('rectangleInput').style.display = 'none';
            document.getElementById('squareInput').style.display = 'none';
            document.getElementById('circleInput').style.display = 'none';

            var shape = document.querySelector("input[name=shape]:checked").value;
            if (shape === 'circle') {
                document.getElementById('circleInput').style.display = 'block';
            }
            else if (shape === 'square') {
                document.getElementById('squareInput').style.display = 'block';
            }
            else if (shape === 'rectangle') {
                document.getElementById('rectangleInput').style.display = 'block';
            }
        }
    </script>
</body>

</html>