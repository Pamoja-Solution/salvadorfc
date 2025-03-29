@include("components.layouts.app")

<div class="min-h-screen ">
    <!-- Glow effect -->
    <div class="fixed glow w-[600px] h-[600px] bg-[radial-gradient(circle,rgba(79,70,229,0.2)_0%,transparent_70%)] transform -translate-x-1/2 -translate-y-1/2 pointer-events-none z-0"></div>

    <div class="container mx-auto px-4 py-12 max-w-7xl">
        <header class="text-center mb-12 relative z-10">
            <h1 class="text-4xl md:text-5xl font-bold mb-2 bg-gradient-to-r from-purple-400 to-indigo-600 bg-clip-text text-transparent">
                FC Salvador
            </h1>
            <h2 class="text-lg md:text-xl text-gray-600 dark:text-gray-200 font-medium">
                Calendrier des matches 2024-2025
            </h2>
        </header>

        <div class="flex justify-center mb-8 relative z-10">
            <div class="flex space-x-2 bg-gray-200 rounded-full p-1 backdrop-blur-md">
                <button id="upcoming-tab" class="px-6 py-2 rounded-full font-medium bg-gradient-to-r from-purple-600 to-blue-600 text-white transition-all duration-300">
                    À venir
                </button>
                <button id="past-tab" class="px-6 py-2 rounded-full font-medium bg-transparent text-gray-700 transition-all duration-300">
                    Terminés
                </button>
            </div>
        </div>

        <div class="flex justify-center mb-8">
            <div class="flex space-x-4">
                <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors">
                    &lt; Mois précédent
                </button>
                <button class="px-4 py-2 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-colors">
                    Mois suivant &gt;
                </button>
            </div>
        </div>

        <div id="upcoming-matches" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Upcoming matches will be inserted here -->
            <div class="col-span-full text-center py-12">
                <div class="inline-block w-12 h-12 border-4 border-gray-300 border-t-purple-600 rounded-full animate-spin mb-4"></div>
                <p class="text-gray-500">Chargement des matches à venir...</p>
            </div>
        </div>

        <div id="past-matches" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 hidden">
            <!-- Past matches will be inserted here -->
            <div class="col-span-full text-center py-12">
                <div class="inline-block w-12 h-12 border-4 border-gray-300 border-t-purple-600 rounded-full animate-spin mb-4"></div>
                <p class="text-gray-500">Chargement des matches terminés...</p>
            </div>
        </div>
    </div>
</div>

<script>
    // Fonction pour formater la date
    function formatDate(dateString) {
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        return new Date(dateString).toLocaleDateString('fr-FR', options);
    }

    // Fonction pour créer une carte de match
    function createMatchCard(match) {
        const card = document.createElement('div');
        card.className = 'bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:scale-[1.02] hover:shadow-xl border border-gray-200';
        
        const scoreDisplay = match.played ? 
            `<div class="text-2xl font-bold text-gray-900">${match.score || 'N/A'}</div>` : 
            `<div class="text-2xl font-bold text-gray-500">vs</div>`;
        
        card.innerHTML = `
            <div class="p-6 dark:bg-gray-800">
                <div class="flex justify-between items-center mb-4 dark:text-gray-200 dark:bg-gray-800 ">
                    <span class="px-3 py-1 bg-blue-100 text-blue-800 text-xs font-medium rounded-full">
                        ${match.competition}
                    </span>
                    <span class="text-sm text-gray-500 dark:text-gray-200">${match.journee}</span>
                </div>
                
                <div class="text-center mb-6 dark:text-gray-200 dark:bg-gray-800">
                    <div class="text-lg font-semibold text-gray-900 dark:text-gray-200">${formatDate(match.date)}</div>
                    <span class="inline-block dark:text-gray-900 mt-1 px-3 py-1 bg-gray-100 text-gray-800 text-sm rounded-full">
                        ${match.time}
                    </span>
                </div>
                
                <div class="flex justify-between items-center mb-6">
                    <div class="flex flex-col items-center w-[40%]">
                        <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mb-2 text-xl font-bold text-gray-800">
                            ${match.homeLogo}
                        </div>
                        <span class="text-center text-sm font-medium text-gray-900 dark:text-gray-200">${match.homeTeam}</span>
                    </div>
                    
                    <div class="w-[20%] flex justify-center">
                        ${scoreDisplay}
                    </div>
                    
                    <div class="flex flex-col items-center w-[40%]">
                        <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mb-2 text-xl font-bold text-gray-800">
                            ${match.awayLogo}
                        </div>
                        <span class="text-center text-sm font-medium text-gray-900 dark:text-gray-200">${match.awayTeam}</span>
                    </div>
                </div>
                
                <div class="px-4 py-3 bg-gray-100 rounded-lg dark:bg-gray-500">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-gray-600 dark:text-gray-200">${match.stadium}</span>
                        <span class="px-2 py-1 rounded-full font-bold text-xs font-medium ${match.status === 'exterieur' ? 'bg-red-100 text-red-800' : 'bg-purple-100 text-purple-800'}">
                            ${match.status === 'domicile' ? 'Domicile' : 'Extérieur'}
                        </span>
                    </div>
                </div>
            </div>
        `;
        
        return card;
    }

    // Fonction pour afficher les matches
    function displayMatches(matches) {
        const upcomingContainer = document.getElementById('upcoming-matches');
        const pastContainer = document.getElementById('past-matches');
        
        upcomingContainer.innerHTML = '';
        pastContainer.innerHTML = '';
        
        const upcomingMatches = matches.filter(match => !match.played);
        const pastMatches = matches.filter(match => match.played);
        
        if (upcomingMatches.length === 0) {
            upcomingContainer.innerHTML = `
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500">Aucun match à venir pour le moment</p>
                </div>
            `;
        } else {
            upcomingMatches.forEach(match => {
                upcomingContainer.appendChild(createMatchCard(match));
            });
        }
        
        if (pastMatches.length === 0) {
            pastContainer.innerHTML = `
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500">Aucun match passé pour le moment</p>
                </div>
            `;
        } else {
            pastMatches.forEach(match => {
                pastContainer.appendChild(createMatchCard(match));
            });
        }
    }

    // Gestion des onglets
    document.getElementById('upcoming-tab').addEventListener('click', function() {
        document.getElementById('upcoming-tab').classList.add('bg-gradient-to-r', 'from-purple-600', 'to-blue-600', 'text-white');
        document.getElementById('upcoming-tab').classList.remove('bg-transparent', 'text-gray-700');
        document.getElementById('past-tab').classList.add('bg-transparent', 'text-gray-700');
        document.getElementById('past-tab').classList.remove('bg-gradient-to-r', 'from-purple-600', 'to-blue-600', 'text-white');
        
        document.getElementById('upcoming-matches').classList.remove('hidden');
        document.getElementById('past-matches').classList.add('hidden');
    });

    document.getElementById('past-tab').addEventListener('click', function() {
        document.getElementById('past-tab').classList.add('bg-gradient-to-r', 'from-purple-600', 'to-blue-600', 'text-white');
        document.getElementById('past-tab').classList.remove('bg-transparent', 'text-gray-700');
        document.getElementById('upcoming-tab').classList.add('bg-transparent', 'text-gray-700');
        document.getElementById('upcoming-tab').classList.remove('bg-gradient-to-r', 'from-purple-600', 'to-blue-600', 'text-white');
        
        document.getElementById('past-matches').classList.remove('hidden');
        document.getElementById('upcoming-matches').classList.add('hidden');
    });

    // Mouse glow effect
    document.addEventListener('DOMContentLoaded', () => {
        const glow = document.querySelector('.glow');
        if (glow) {
            document.addEventListener('mousemove', (e) => {
                glow.style.left = `${e.clientX}px`;
                glow.style.top = `${e.clientY}px`;
            });
        }

        // Chargement des matches
        fetch('/api/matches')
            .then(response => {
                if (!response.ok) throw new Error('Erreur réseau');
                return response.json();
            })
            .then(matches => {
                displayMatches(matches);
            })
            .catch(error => {
                console.error('Erreur:', error);
                document.getElementById('upcoming-matches').innerHTML = `
                    <div class="col-span-full text-center py-12">
                        <p class="text-red-500">Erreur lors du chargement des matches</p>
                    </div>
                `;
                document.getElementById('past-matches').innerHTML = `
                    <div class="col-span-full text-center py-12">
                        <p class="text-red-500">Erreur lors du chargement des matches</p>
                    </div>
                `;
            });
    });
</script>

@include("entete.footer")