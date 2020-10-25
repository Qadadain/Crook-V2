export const rulesPassword = {
       // 'samePassword': 'Les mots de passe ne correspondent pas',
        'noValid': 'Votre mot de passe doit contenir une majuscule, un chiffre et un caractère spécial (!@#$&+-)',
        'regexPassword': new RegExp('^(?=.*[0-9]+)(?=.*[a-z])(?=.*[A-Z]+)[a-zA-Z0-9!@#$%^&*{}_\+-]{8,}$'),
}

export const rulesEmail = {
    'regexEmail': new RegExp('^[a-zA-Z0-9.!#$%&\'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\\.[a-zA-Z0-9-]+)*$'),
    'noValid': 'Votre adresse email est invalide',
    'isUsed': 'Cette adresse email est déja enregistrée sur le site',
};

export const rulesPseudo = {
    'lenght': 'Votre pseudo doit faire au maximum 50 caractères',
    'isUsed': 'Ce pseudo est déjà utilisé',
};


