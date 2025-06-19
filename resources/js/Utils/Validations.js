export function validateRut(rut) {
    if (!rut) return false;
    const rutFormatRegex = /^\d{8}-[0-9Kk]{1}$/;
    if (!rutFormatRegex.test(rut)) {
        return false; // Formato inválido
    }
    const [body, verifier] = rut.split('-');
    const cleanVerifier = verifier.toUpperCase();
    let sum = 0;
    let multiplier = 2;
    for (let i = body.length - 1; i >= 0; i--) {
        sum += body.charAt(i) * multiplier;
        multiplier = multiplier === 7 ? 2 : multiplier + 1;
    }
    const mod = 11 - (sum % 11);
    const expectedVerifier = mod === 11 ? '0' : mod === 10 ? 'K' : mod.toString();
    return cleanVerifier === expectedVerifier;
}

export function validatePhone(phone) {
    const cleanedPhone = phone.replace(/[^\d]/g, '');
    const chileanPhoneRegex = /^9\d{8}$/;
    return chileanPhoneRegex.test(cleanedPhone);
}