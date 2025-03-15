  
<footer>

    <!-- Abonnement à la newsletter -->
    <div class="m-6 mt-20 " id="newsletter-container">
      <div class="grid grid-cols-1 lg:grid-cols-5">
          <div class="lg:col-span-3 p-8 lg:p-12">
              <h3 class="text-2xl md:text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-4">Restez informé !</h3>
              <p class="text-gray-800 dark:text-gray-300 mb-6">Inscrivez-vous à notre newsletter pour ne rien manquer des dernières actualités, résultats et événements du FC Salvador.</p>
              
              <form class="space-y-4">
                  <div class="flex flex-col sm:flex-row gap-4">
                      <input type="text" placeholder="Votre nom" class="dark:bg-gray-700/50 dark:text-white border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                      <input type="email" placeholder="Votre email" class="dark:bg-gray-700/50 dark:text-white border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                  </div>
                  <div class="flex items-center">
                      <input type="checkbox" id="newsletter-consent" class="rounded text-purple-500 focus:ring-purple-500">
                      <label for="newsletter-consent" class="ml-2 dark:text-gray-300 text-gray-800 text-sm">J'accepte de recevoir les actualités du FC Salvador par email</label>
                  </div>
                  <button type="submit" class="px-6 py-3 bg-gradient-to-r from-purple-500 to-blue-500 text-white font-semibold rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 w-full sm:w-auto">
                      S'abonner
                  </button>
              </form>
          </div>
          <div class="lg:col-span-2 hidden lg:block relative">
              <img src="{{ asset('img/1740169797146.jpg') }}" alt="Newsletter" class="absolute inset-0 h-full w-full object-cover">
              <div class="absolute inset-0 bg-gradient-to-r from-gray-300 dark:bg-gradient-to-r dark:from-gray-900 to-transparent"></div>
          </div>
      </div>
    </div>

      <!-- Footer -->
        <footer class="bg-gradient-to-r from-blue-900 to-purple-900 py-6">
            <div class="container mx-auto text-center">
                <p class="dark:text-gray-300 text-gray-200"><a href="https://portefolio.mascodeproduct.com/">Par Pamoja Solution</a></p>
                <p class="dark:text-gray-300 text-gray-200">&copy; {{ date('Y') }} Club Name. Tous droits réservés.</p>
                    </div>
        </footer>

        <!-- Script pour le menu burger -->
        <script>
            const menuToggle = document.getElementById('menu-toggle');
            const navMenu = document.getElementById('nav-menu');

            menuToggle.addEventListener('click', () => {
                navMenu.classList.toggle('hidden');
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
    // Sélectionner le formulaire de newsletter
    const newsletterForm = document.querySelector('#newsletter-container form');
    
    // Ajouter un écouteur d'événement pour la soumission du formulaire
    newsletterForm.addEventListener('submit', function(event) {
        // Empêcher le comportement par défaut du formulaire
        event.preventDefault();
        
        // Récupérer les valeurs des champs
        const nameInput = this.querySelector('input[type="text"]');
        const emailInput = this.querySelector('input[type="email"]');
        const consentCheckbox = this.querySelector('#newsletter-consent');
        
        // Vérifier si les champs sont remplis
        if (!nameInput.value.trim()) {
            showMessage('Veuillez entrer votre nom', 'error');
            return;
        }
        
        if (!emailInput.value.trim()) {
            showMessage('Veuillez entrer votre email', 'error');
            return;
        }
        
        if (!consentCheckbox.checked) {
            showMessage('Veuillez accepter de recevoir nos actualités', 'error');
            return;
        }
        
        // Simuler l'envoi du formulaire
        // Ici, vous pourriez ajouter un appel AJAX vers votre backend
        
        // Afficher un message de succès
        showMessage('Merci pour votre abonnement à notre newsletter!', 'success');
        
        // Réinitialiser le formulaire
        this.reset();
    });
    
    // Fonction pour afficher un message à l'utilisateur
    function showMessage(message, type) {
        // Créer l'élément de message
        const messageElement = document.createElement('div');
        
        // Ajouter les classes selon le type de message
        messageElement.classList.add('message', 'fixed', 'top-4', 'right-4', 'p-4', 'rounded-lg', 'shadow-lg', 'z-50', 'transform', 'transition-all', 'duration-300');
        
        if (type === 'success') {
            messageElement.classList.add('bg-green-500', 'text-white');
        } else if (type === 'error') {
            messageElement.classList.add('bg-red-500', 'text-white');
        }
        
        // Ajouter le contenu du message
        messageElement.textContent = message;
        
        // Ajouter le message à la page
        document.body.appendChild(messageElement);
        
        // Supprimer le message après 3 secondes
        setTimeout(() => {
            messageElement.classList.add('opacity-0', '-translate-y-2');
            setTimeout(() => {
                document.body.removeChild(messageElement);
            }, 300);
        }, 3000);
    }
});
        </script>
</footer>