class BinaryConverter {
    constructor(bin) {
        this.binary = bin;
    }

    toDecimal() {
        let decimal = 0;
        for (let i = 0; i < this.binary.length; i++) {
            decimal += (parseInt(this.binary[i]) - 0) * Math.pow(2, this.binary.length - 1 - i);
        }
        return decimal;
    }

    toHexadecimal() {
        let hexadecimal = "";
        let decimal = this.toDecimal();
        while (decimal > 0) {
            let pom1 = decimal % 16;
            if (pom1 < 10) {
                hexadecimal = String.fromCharCode(pom1 + '0'.charCodeAt(0)) + hexadecimal;
            } else {
                hexadecimal = String.fromCharCode(pom1 - 10 + 'A'.charCodeAt(0)) + hexadecimal;
            }
            decimal = parseInt(decimal / 16);
        }
        return hexadecimal;
    }

    toOctal() {
        let octal = "";
        let decimal = this.toDecimal();
        while (decimal > 0) {
            let pom1 = decimal % 8;
            octal = String.fromCharCode(pom1 + '0'.charCodeAt(0)) + octal;
            decimal = parseInt(decimal / 8);
        }
        return octal;
    }
}

class DecimalConverter {
    constructor(dec) {
        this.decimal = dec;
    }

    toBinary() {
        let binary = "";
        let pom = this.decimal;
        while (pom > 0) {
            let pom1 = pom % 2;
            binary = String.fromCharCode(pom1 + '0'.charCodeAt(0)) + binary;
            pom = parseInt(pom / 2);
        }
        return binary;
    }

    toHexadecimal() {
        let hexadecimal = "";
        let pom = this.decimal;
        while (pom > 0) {
            let pom1 = pom % 16;
            if (pom1 < 10) {
                hexadecimal = String.fromCharCode(pom1 + '0'.charCodeAt(0)) + hexadecimal;
            } else {
                hexadecimal = String.fromCharCode(pom1 - 10 + 'A'.charCodeAt(0)) + hexadecimal;
            }
            pom = parseInt(pom / 16);
        }
        return hexadecimal;
    }

    toOctal() {
        let octal = "";
        let pom = this.decimal;
        while (pom > 0) {
            let pom1 = pom % 8;
            octal = String.fromCharCode(pom1 + '0'.charCodeAt(0)) + octal;
            pom = parseInt(pom / 8);
        }
        return octal;
    }
}

class HexadecimalConverter {
    constructor(hex) {
        this.hexadecimal = hex;
    }

    toDecimal() {
        let decimal = 0;
        for (let i = 0; i < this.hexadecimal.length; i++) {
            if (this.hexadecimal[i] >= '0' && this.hexadecimal[i] <= '9') {
                decimal += (parseInt(this.hexadecimal[i]) - 0) * Math.pow(16, this.hexadecimal.length - 1 - i);
            } else if (this.hexadecimal[i] >= 'A' && this.hexadecimal[i] <= 'F') {
                decimal += (parseInt(this.hexadecimal[i]) - 'A'.charCodeAt(0) + 10) * Math.pow(16, this.hexadecimal.length - 1 - i);
            }
        }
        return decimal;
    }

    toBinary() {
        const decConverter = new DecimalConverter(this.toDecimal());
        return decConverter.toBinary();
    }

    toOctal() {
        const decConverter = new DecimalConverter(this.toDecimal());
        return decConverter.toOctal();
    }
}

class OctalConverter {
    constructor(oct) {
        this.octal = oct;
    }

    toDecimal() {
        let decimal = 0;
        for (let i = 0; i < this.octal.length; i++) {
            decimal += (parseInt(this.octal[i]) - 0) * Math.pow(8, this.octal.length - 1 - i);
        }
        return decimal;
    }

    toBinary() {
        const decConverter = new DecimalConverter(this.toDecimal());
        return decConverter.toBinary();
    }

    toHexadecimal() {
        const decConverter = new DecimalConverter(this.toDecimal());
        return decConverter.toHexadecimal();
    }
}

let choice = 0;

console.log("Dobrodosli u nas konvertor by Ismir i Hasan!");

do {
    console.log("\nOdaberite opciju iz menija ispod:");
    console.log("1. Konverzija binarni u dekadni");
    console.log("2. Konverzija dekadnog u binarni");
    console.log("3. Konverzija binarnog u hexadekadni");
    console.log("4. Konverzija hexadekadnog u binarni");
    console.log("5. Konverzija binarnog u oktalni");
    console.log("6. Konverzija oktalnog u binarni");
    console.log("0. Izlaz iz programa");
    console.log("                                  \n");
    
    choice = parseInt(prompt("Vasa opcija: "));

    switch (choice) {
        case 1: {
            const binary = prompt("Unesite binarnu vrijednost: ");
            const binConverter = new BinaryConverter(binary);
            console.log("Dekadna vrijednost: " + binConverter.toDecimal());
            break;
        }
        case 2: {
            const decimal = parseInt(prompt("Unesite dekadnu vrijednost: "));
            const decConverter = new DecimalConverter(decimal);
            console.log("Binarna vrijednost: " + decConverter.toBinary());
            break;
        }
        case 3: {
            const binary = prompt("Unesite binarnu vrijednost: ");
            const binConverter = new BinaryConverter(binary);
            console.log("Hexadekadna vrijednost: " + binConverter.toHexadecimal());
            break;
        }
        case 4: {
            const hexadecimal = prompt("Unesite hexadekadnu vrijednost: ");
            const hexConverter = new HexadecimalConverter(hexadecimal);
            console.log("Binarna vrijednost: " + hexConverter.toBinary());
            break;
        }
        case 5: {
            const binary = prompt("Unesite binarnu vrijednost: ");
            const binConverter = new BinaryConverter(binary);
            console.log("Oktalna vrijednost: " + binConverter.toOctal());
            break;
        }
        case 6: {
            const octal = prompt("Unesite oktalnu vrijednost: ");
            const octConverter = new OctalConverter(octal);
            console.log("Binarna vrijednost: " + octConverter.toBinary());
            break;
        }
        case 0: {
            console.log("Izlazim iz programa! Hvala vam sto ste koristili nas program!");
            break;
        }
        default: {
            console.log("Odabrali ste pogresnu opciju. Molimo odraditi ponovno unos:");
            break;
        }
    }
} while (choice !== 0);
