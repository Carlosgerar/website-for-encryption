function gcd(a, b) {
    while (b !== 0) {
        let temp = b;
        b = a % b;
        a = temp;
    }
    return a;
}

function modExp(base, exp, mod) {
    if (exp === 0) return 1;
    let z = modExp(base, Math.floor(exp / 2), mod);
    z = (z * z) % mod;
    if (exp % 2 !== 0) z = (z * base) % mod;
    return z;
}

function modInverse(a, m) {
    let m0 = m, t, q;
    let x0 = 0, x1 = 1;
    if (m === 1) return 0;
    while (a > 1) {
        q = Math.floor(a / m);
        t = m;
        m = a % m;
        a = t;
        t = x0;
        x0 = x1 - q * x0;
        x1 = t;
    }
    if (x1 < 0) x1 += m0;
    return x1;
}

function generatePrime() {
    while (true) {
        let num = Math.floor(Math.random() * 100) + 2;
        if (isPrime(num)) return num;
    }
}

function isPrime(num) {
    if (num <= 1) return false;
    if (num <= 3) return true;
    if (num % 2 === 0 || num % 3 === 0) return false;
    for (let i = 5; i * i <= num; i += 6) {
        if (num % i === 0 || num % (i + 2) === 0) return false;
    }
    return true;
}
function generateRSAKeys() {
    let p = generatePrime();
    let q = generatePrime();
    while (p === q) q = generatePrime(); 

    let n = p * q;
    let phi = (p - 1) * (q - 1);

    let e = 3;
    while (gcd(e, phi) !== 1) {
        e += 2; 
    }

    let d = modInverse(e, phi);

    return {
        publicKey: { e, n },
        privateKey: { d, n }
    };
}
function encrypt(message, publicKey) {
    const { e, n } = publicKey;
    let m = message.split('').map(char => char.charCodeAt(0));
    let c = m.map(charCode => modExp(charCode, e, n));
    return c;
}

function decrypt(ciphertext, privateKey) {
    const { d, n } = privateKey;
    let m = ciphertext.map(charCode => modExp(charCode, d, n));
    let message = m.map(charCode => String.fromCharCode(charCode)).join('');
    return message;
}