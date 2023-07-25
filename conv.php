<?php

class BinaryConverter {
    private $binary;

    public function __construct($bin) {
        $this->binary = $bin;
    }

    public function toDecimal() {
        $decimal = 0;
        for ($i = 0; $i < strlen($this->binary); $i++) {
            $decimal += ($this->binary[$i] - '0') * pow(2, strlen($this->binary) - 1 - $i);
        }
        return $decimal;
    }

    public function toHexadecimal() {
        $hexadecimal = "";
        $decimal = $this->toDecimal();
        while ($decimal > 0) {
            $pom1 = $decimal % 16;
            if ($pom1 < 10) {
                $hexadecimal = chr($pom1 + '0') . $hexadecimal;
            } else {
                $hexadecimal = chr($pom1 - 10 + 'A') . $hexadecimal;
            }
            $decimal = (int)($decimal / 16);
        }
        return $hexadecimal;
    }

    public function toOctal() {
        $octal = "";
        $decimal = $this->toDecimal();
        while ($decimal > 0) {
            $pom1 = $decimal % 8;
            $octal = chr($pom1 + '0') . $octal;
            $decimal = (int)($decimal / 8);
        }
        return $octal;
    }
}

class DecimalConverter {
    private $decimal;

    public function __construct($dec) {
        $this->decimal = $dec;
    }

    public function toBinary() {
        $binary = "";
        $pom = $this->decimal;
        while ($pom > 0) {
            $pom1 = $pom % 2;
            $binary = chr($pom1 + '0') . $binary;
            $pom = (int)($pom / 2);
        }
        return $binary;
    }

    public function toHexadecimal() {
        $hexadecimal = "";
        $pom = $this->decimal;
        while ($pom > 0) {
            $pom1 = $pom % 16;
            if ($pom1 < 10) {
                $hexadecimal = chr($pom1 + '0') . $hexadecimal;
            } else {
                $hexadecimal = chr($pom1 - 10 + 'A') . $hexadecimal;
            }
            $pom = (int)($pom / 16);
        }
        return $hexadecimal;
    }

    public function toOctal() {
        $octal = "";
        $pom = $this->decimal;
        while ($pom > 0) {
            $pom1 = $pom % 8;
            $octal = chr($pom1 + '0') . $octal;
            $pom = (int)($pom / 8);
        }
        return $octal;
    }
}

class HexadecimalConverter {
    private $hexadecimal;

    public function __construct($hex) {
        $this->hexadecimal = $hex;
    }

    public function toDecimal() {
        $decimal = 0;
        for ($i = 0; $i < strlen($this->hexadecimal); $i++) {
            if ($this->hexadecimal[$i] >= '0' && $this->hexadecimal[$i] <= '9') {
                $decimal += ($this->hexadecimal[$i] - '0') * pow(16, strlen($this->hexadecimal) - 1 - $i);
            } else if ($this->hexadecimal[$i] >= 'A' && $this->hexadecimal[$i] <= 'F') {
                $decimal += ($this->hexadecimal[$i] - 'A' + 10) * pow(16, strlen($this->hexadecimal) - 1 - $i);
            }
        }
        return $decimal;
    }

    public function toBinary() {
        $decConverter = new DecimalConverter($this->toDecimal());
        return $decConverter->toBinary();
    }

    public function toOctal() {
        $decConverter = new DecimalConverter($this->toDecimal());
        return $decConverter->toOctal();
    }
}

class OctalConverter {
    private $octal;

    public function __construct($oct) {
        $this->octal = $oct;
    }

    public function toDecimal() {
        $decimal = 0;
        for ($i = 0; $i < strlen($this->octal); $i++) {
            $decimal += ($this->octal[$i] - '0') * pow(8, strlen($this->octal) - 1 - $i);
        }
        return $decimal;
    }

    public function toBinary() {
        $decConverter = new DecimalConverter($this->toDecimal());
        return $decConverter->toBinary();
    }

    public function toHexadecimal() {
        $decConverter = new DecimalConverter($this->toDecimal());
        return $decConverter->toHexadecimal();
    }
}

$choice = 0;

echo "Dobrodosli u nas konvertor by Ismir i Hasan!" . PHP_EOL;
do {
    echo PHP_EOL . "Odaberite opciju iz menija ispod:" . PHP_EOL;
    echo "1. Konverzija binarni u dekadni" . PHP_EOL;
    echo "2. Konverzija dekadnog u binarni" . PHP_EOL;
    echo "3. Konverzija binarnog u hexadekadni" . PHP_EOL;
    echo "4. Konverzija hexadekadnog u binarni" . PHP_EOL;
    echo "5. Konverzija binarnog u oktalni" . PHP_EOL;
    echo "6. Konverzija oktalnog u binarni" . PHP_EOL;
    echo "0. Izlaz iz programa" . PHP_EOL;
    echo "                                  \n";
    echo "Vasa opcija: ";
    $choice = (int)readline();

    switch ($choice) {
        case 1: {
            echo "Unesite binarnu vrijednost: ";
            $binary = readline();
            $binConverter = new BinaryConverter($binary);
            echo "Dekadna vrijednost: " . $binConverter->toDecimal() . PHP_EOL;
            break;
        }
        case 2: {
            echo "Unesite dekadnu vrijednost: ";
            $decimal = (int)readline();
            $decConverter = new DecimalConverter($decimal);
            echo "Binarna vrijednost: " . $decConverter->toBinary() . PHP_EOL;
            break;
        }
        case 3: {
            echo "Unesite binarnu vrijednost: ";
            $binary = readline();
            $binConverter = new BinaryConverter($binary);
            echo "Hexadekadna vrijednost: " . $binConverter->toHexadecimal() . PHP_EOL;
            break;
        }
        case 4: {
            echo "Unesite hexadekadnu vrijednost: ";
            $hexadecimal = readline();
            $hexConverter = new HexadecimalConverter($hexadecimal);
            echo "Binarna vrijednost: " . $hexConverter->toBinary() . PHP_EOL;
            break;
        }
        case 5: {
            echo "Unesite binarnu vrijednost: ";
            $binary = readline();
            $binConverter = new BinaryConverter($binary);
            echo "Oktalna vrijednost: " . $binConverter->toOctal() . PHP_EOL;
            break;
        }
        case 6: {
            echo "Unesite oktalnu vrijednost: ";
            $octal = readline();
            $octConverter = new OctalConverter($octal);
            echo "Binarna vrijednost: " . $octConverter->toBinary() . PHP_EOL;
            break;
        }
        case 0: {
            echo "Izlazim iz programa! Hvala vam sto ste koristili nas program!" . PHP_EOL;
            break;
        }
        default: {
            echo "Odabrali ste pogresnu opciju. Molimo odraditi ponovno unos:" . PHP_EOL;
            break;
        }
    }
} while ($choice != 0);
