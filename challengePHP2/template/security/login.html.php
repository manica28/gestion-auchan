<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes glow {
            0%, 100% { box-shadow: 0 0 20px rgba(163, 230, 53, 0.2); }
            50% { box-shadow: 0 0 30px rgba(163, 230, 53, 0.4); }
        }
        
        .animate-fadeIn {
            animation: fadeIn 0.8s ease-out;
        }
        
        .animate-glow {
            animation: glow 2s ease-in-out infinite;
        }
        
        .glass-effect {
            backdrop-filter: blur(10px);
            border: 1px solid rgba(163, 230, 53, 0.1);
        }
        
        .input-focus:focus {
            box-shadow: 0 0 0 2px rgba(163, 230, 53, 0.3);
            border: 2px solid rgba(163, 230, 53, 0.5);
        }
        
        .floating-elements::before {
            content: '';
            position: absolute;
            width: 100px;
            height: 100px;
            background: radial-gradient(circle, rgba(163, 230, 53, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            top: 10%;
            left: 10%;
            animation: float 6s ease-in-out infinite;
        }
        
        .floating-elements::after {
            content: '';
            position: absolute;
            width: 150px;
            height: 150px;
            background: radial-gradient(circle, rgba(163, 230, 53, 0.08) 0%, transparent 70%);
            border-radius: 50%;
            bottom: 10%;
            right: 10%;
            animation: float 8s ease-in-out infinite reverse;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }
        
        .button-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(163, 230, 53, 0.3);
        }
        
        .input-container {
            position: relative;
        }
        
        .input-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(163, 230, 53, 0.1), rgba(163, 230, 53, 0.05));
            border-radius: 0.375rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .input-container:hover::before {
            opacity: 1;
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-[#101d0b] relative overflow-hidden floating-elements">
        <div class="bg-[#151f11] glass-effect p-8 rounded-2xl shadow-2xl w-full max-w-md animate-fadeIn animate-glow relative z-10">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-lime-400 mb-2">Connexion</h2>
                <div class="w-20 h-1 bg-gradient-to-r from-lime-400 to-lime-500 mx-auto rounded-full"></div>
            </div>
            
            <div id="error-message" class="mb-4 text-red-400 text-center p-3 rounded-lg bg-red-900/20 border border-red-500/20 hidden">
                Message d'erreur ici
            </div>
            
            <form method="post" action="/login" class="space-y-6">
                <div class="input-container">
                    <label class="block text-gray-200 mb-2 font-medium">Login</label>
                    <input type="text" name="login" 
                           class="w-full px-4 py-3 rounded-lg bg-[#232d1a] text-white focus:outline-none input-focus transition-all duration-300 relative z-10" 
                           required>
                </div>
                
                <div class="input-container">
                    <label class="block text-gray-200 mb-2 font-medium">Mot de passe</label>
                    <input type="password" name="password" 
                           class="w-full px-4 py-3 rounded-lg bg-[#232d1a] text-white focus:outline-none input-focus transition-all duration-300 relative z-10" 
                           required>
                </div>
                
                <button type="submit" 
                        class="w-full bg-lime-400 text-[#101d0b] font-semibold py-3 rounded-lg hover:bg-lime-500 transition-all duration-300 button-hover transform active:scale-95">
                    Se connecter
                </button>
            </form>
            
            <div class="mt-6 text-center">
                <p class="text-gray-400 text-sm">
                    Mot de passe oublié ? 
                    <a href="#" class="text-lime-400 hover:text-lime-300 transition-colors duration-200">Cliquez ici</a>
                </p>
            </div>
        </div>
        
        <!-- Particules flottantes décoratives -->
        <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-lime-400 rounded-full opacity-20 animate-pulse"></div>
        <div class="absolute top-3/4 right-1/3 w-1 h-1 bg-lime-400 rounded-full opacity-30 animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute bottom-1/3 left-1/6 w-3 h-3 bg-lime-400 rounded-full opacity-10 animate-pulse" style="animation-delay: 2s;"></div>
    </div>
    
    <script>
        // Animation d'entrée pour les champs
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input');
            inputs.forEach((input, index) => {
                input.style.animationDelay = `${index * 0.1}s`;
                input.classList.add('animate-fadeIn');
            });
            
            // Effet de focus amélioré
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'scale(1.02)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'scale(1)';
                });
            });
            
            // Animation du bouton
            const button = document.querySelector('button[type="submit"]');
            button.addEventListener('mouseenter', function() {
                this.style.background = 'linear-gradient(45deg, #a3e635, #84cc16)';
            });
            
            button.addEventListener('mouseleave', function() {
                this.style.background = '#a3e635';
            });
        });
    </script>
</body>
</html>