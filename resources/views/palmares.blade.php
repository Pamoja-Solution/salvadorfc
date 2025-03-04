@extends('entete.base')
@section("contenus")

<!-- Section Palmarès : Historique des trophées et réalisations avec effets 3D -->
<section id="achievements" class="py-20 bg-gradient-to-br from-gray-900 to-gray-800 overflow-hidden relative">
    <!-- Particules d'arrière-plan pour effet dynamique -->
    <div class="absolute inset-0 opacity-20" id="particles-achievements"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <!-- Titre de la section avec animation -->
        <h2 class="text-4xl md:text-5xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-4 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out" id="achievements-title">
            Palmarès FC Salvador
        </h2>
        
        <p class="text-center text-gray-300 mb-16 max-w-3xl mx-auto opacity-0 transform translate-y-10 transition-all duration-1000 ease-out delay-100" id="achievements-subtitle">
            Notre quête d'excellence et notre engagement sans faille nous ont permis de bâtir un héritage dont nous sommes fiers. Découvrez les accomplissements de notre équipe à travers les années.
        </p>

        <!-- Bannière 3D avec effet de perspective -->
        <div class="relative h-[300px] md:h-[400px] mb-20 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out delay-200" id="trophy-showcase">
            <div class="absolute inset-0 perspective trophy-3d-container">
                <div class="absolute inset-0 transform-3d trophy-rotation py-10 flex flex-col items-center justify-center rounded-2xl overflow-hidden">
                    <!-- Arrière-plan avec effet parallaxe -->
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-900/80 to-purple-900/80 backdrop-blur-sm trophy-bg"></div>
                    
                    <!-- Effet de particules/étoiles -->
                    <div class="absolute inset-0 stars-effect"></div>
                    
                    <!-- Contenu principal -->
                    <div class="relative z-10 flex flex-col items-center px-6 py-10">
                        <!-- Trophée en 3D avec reflet -->
                        <div class="mb-8 trophy-3d-object">
                            <div class="relative w-32 h-40 md:w-40 md:h-48">
                                <div class="absolute w-full h-full trophy-inner flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-full h-full text-yellow-500 trophy-svg">
                                        <path fill="currentColor" d="M18 5V3H6V5H4V7C4 8.61 5.13 9.91 6.66 10H17.34C18.87 9.91 20 8.61 20 7V5H18ZM8 5V4H16V5H8ZM14 15.32C13.4 15.77 13 16.54 13 17.41V20H11V17.41C11.03 16.25 12.03 15.31 13.19 15.35L13.82 15.45C14.3 15.53 14.71 15.85 14.89 16.27C14.95 16.42 15 16.59 15 16.77C15 17.11 14.79 17.42 14.5 17.57L14 15.32ZM18 10C19.1 10 20 10.9 20 12C20 13.1 19.1 14 18 14H15.19C14.54 13.47 13.41 13.5 12.84 14.09L12.5 14.41C11.5 15.38 11.03 16.77 11.17 18.19H20C20.55 18.19 21 18.64 21 19.19C21 19.74 20.55 20.19 20 20.19H4C3.45 20.19 3 19.74 3 19.19C3 18.64 3.45 18.19 4 18.19H6.88C7.07 16.65 6.57 15.07 5.5 14L5.21 13.72C4.66 13.17 4.37 12.38 4.42 11.57C4.47 10.78 4.86 10.05 5.48 9.61C6.1 9.17 6.88 9.03 7.61 9.23C8.46 9.47 9.12 10.13 9.35 10.97C9.43 11.24 9.46 11.52 9.46 11.8C9.46 13 8.68 14.04 7.53 14.5L9 15.96C9.11 15.35 9.33 14.77 9.67 14.27L9.95 13.86C10.58 12.94 11.65 12.46 12.7 12.62L13.19 12.71C14.97 13 16.28 14.54 16.29 16.34C16.29 16.44 16.28 16.53 16.28 16.63H18C20.21 16.63 22 14.83 22 12.63C22 10.23 20.02 8.31 17.64 8.5C17.76 8.01 17.82 7.5 17.82 6.977C17.82 6.977 17.828 6.94 17.83 6.88H6.24C6.25 6.94 6.26 7 6.26 7.06C6.26 8.07 5.97 9 5.46 9.75C5.55 9.77 5.63 9.8 5.72 9.83C5.88 9.88 6.03 9.95 6.17 10H18Z"/>
                                    </svg>
                                    <!-- Effet de brillance/éclat -->
                                    <div class="absolute inset-0 trophy-shine"></div>
                                </div>
                                <!-- Ombre/reflet sous le trophée -->
                                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-3/4 h-4 bg-yellow-500/30 rounded-full blur-md"></div>
                            </div>
                        </div>
                        
                        <h3 class="text-3xl md:text-4xl font-bold text-white mb-4 text-center trophy-text">Champions Régionaux</h3>
                        <p class="text-xl text-yellow-300 font-semibold mb-2 trophy-text">2023-2024</p>
                        <p class="text-gray-200 text-center max-w-xl trophy-text">Une saison exceptionnelle avec 18 victoires et seulement 2 défaites, couronnée par un titre mérité et une qualification pour la Coupe Nationale.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Timeline des accomplissements -->
        <div class="mb-20 relative opacity-0 transform translate-y-10 transition-all duration-1000 ease-out delay-300" id="timeline-container">
            <!-- Ligne centrale de la timeline -->
            <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-gradient-to-b from-purple-500 to-blue-500 rounded timeline-line"></div>
            
            <!-- Années de la timeline -->
            <div class="space-y-20">
                <!-- 2024 -->
                <div class="timeline-year">
                    <div class="relative grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-16">
                        <!-- Indicateur d'année -->
                        <div class="absolute left-1/2 transform -translate-x-1/2 top-0 w-16 h-16 rounded-full bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center shadow-lg shadow-purple-500/20 z-10">
                            <span class="text-white font-bold">2024</span>
                        </div>
                        
                        <!-- Réalisation à gauche -->
                        <div class="timeline-item md:text-right mt-20 md:mt-8 md:pr-16 relative achievement-left">
                            <div class="timeline-dot"></div>
                            <div class="bg-gradient-to-br from-gray-800 to-gray-900 p-6 rounded-xl shadow-lg transform transition-all duration-500 hover:shadow-purple-500/10 hover:-translate-y-1 border border-gray-700/50 achievement-card">
                                <h4 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">Championnat Régional</h4>
                                <span class="inline-block px-3 py-1 bg-gradient-to-r from-purple-500/20 to-blue-500/20 text-white text-sm rounded-full mb-3">Champions</span>
                                <p class="text-gray-300 mb-4">Notre équipe a brillamment remporté le championnat régional avec une domination sans précédent: 18 victoires, 4 nuls et seulement 2 défaites.</p>
                                <div class="flex items-center justify-end space-x-2">
                                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                                            <path fill-rule="evenodd" d="M5.166 2.621v.858c-1.035.148-2.059.33-3.071.543a.75.75 0 00-.584.859 6.937 6.937 0 006.431 5.232 6.953 6.953 0 002.992-.675.75.75 0 00.272-1.176A6.962 6.962 0 008.583 3.297a.75.75 0 00-.65.134c-.757.63-1.676.979-2.767.979z" clip-rule="evenodd" />
                                            <path fill-rule="evenodd" d="M4.667 14.432a1 1 0 01.218 1.403A7.009 7.009 0 002.938 17.5h.764a.75.75 0 010 1.5H.75a.75.75 0 01-.75-.75V15.5a.75.75 0 011.5 0v.764a8.51 8.51 0 002.364-2.052 2.5 2.5 0 01.803-3.278 2.5 2.5 0 013.283.798l.007.01c.283.458.147.893-.052 1.103a8.017 8.017 0 01-3.038 1.587zm.958-10.352a6.953 6.953 0 013.11 5.573.75.75 0 01-.456.693 6.953 6.953 0 01-2.99.675 6.937 6.937 0 01-6.43-5.232.75.75 0 01.583-.859 24.257 24.257 0 015.444-.778.75.75 0 01.739.738zm10.75 5.699a.75.75 0 01.22 1.408A8.018 8.018 0 0113.5 12.864c-.196.21-.332.646-.05 1.103l.007.01a2.5 2.5 0 003.282.798 2.5 2.5 0 00.804-3.278 8.51 8.51 0 002.365-2.052v.764a.75.75 0 011.5 0v-2.75a.75.75 0 01-.75-.75h-2.75a.75.75 0 010 1.5h.764a7.009 7.009 0 00-1.946 1.666 1 1 0 01-1.403.217l-.003-.002a1 1 0 01-.218-1.404zM18.75 5.25h2.5a.75.75 0 010 1.5h-2.5a.75.75 0 010-1.5zm-5.5 3.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5zm.22 5.97a2.5 2.5 0 00-1.98 2.53c0 .689.156 1.342.433 1.927.278.585.687 1.12 1.207 1.558a7.474 7.474 0 002.556-1.557 7.47 7.47 0 001.653-2.31.75.75 0 00-.696-1.059 6.5 6.5 0 01-3.173-1.089zm6.5-5.97a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                                            <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Espace à droite pour 2024 -->
                        <div class="md:mt-8 md:pl-16 relative"></div>
                    </div>
                </div>
                
                <!-- 2023 -->
                <div class="timeline-year">
                    <div class="relative grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-16">
                        <!-- Indicateur d'année -->
                        <div class="absolute left-1/2 transform -translate-x-1/2 top-0 w-16 h-16 rounded-full bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center shadow-lg shadow-purple-500/20 z-10">
                            <span class="text-white font-bold">2023</span>
                        </div>
                        
                        <!-- Espace à gauche pour 2023 -->
                        <div class="timeline-item md:text-right mt-20 md:mt-8 md:pr-16 relative"></div>
                        
                        <!-- Réalisation à droite -->
                        <div class="timeline-item mt-8 md:pl-16 relative achievement-right">
                            <div class="timeline-dot"></div>
                            <div class="bg-gradient-to-br from-gray-800 to-gray-900 p-6 rounded-xl shadow-lg transform transition-all duration-500 hover:shadow-purple-500/10 hover:-translate-y-1 border border-gray-700/50 achievement-card">
                                <h4 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">Coupe Municipale</h4>
                                <span class="inline-block px-3 py-1 bg-gradient-to-r from-purple-500/20 to-blue-500/20 text-white text-sm rounded-full mb-3">Finalistes</span>
                                <p class="text-gray-300 mb-4">Un parcours remarquable jusqu'en finale de la coupe municipale, perdue de justesse aux tirs au but après un match héroïque contre le FC Kinshasa (2-2).</p>
                                <div class="flex items-center space-x-2">
                                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                                            <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                        </svg>
                                    </div>
                                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                                            <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- 2022 -->
                <div class="timeline-year">
                    <div class="relative grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-16">
                        <!-- Indicateur d'année -->
                        <div class="absolute left-1/2 transform -translate-x-1/2 top-0 w-16 h-16 rounded-full bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center shadow-lg shadow-purple-500/20 z-10">
                            <span class="text-white font-bold">2022</span>
                        </div>
                        
                        <!-- Réalisation à gauche -->
                        <div class="timeline-item md:text-right mt-20 md:mt-8 md:pr-16 relative achievement-left">
                            <div class="timeline-dot"></div>
                            <div class="bg-gradient-to-br from-gray-800 to-gray-900 p-6 rounded-xl shadow-lg transform transition-all duration-500 hover:shadow-purple-500/10 hover:-translate-y-1 border border-gray-700/50 achievement-card">
                                <h4 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">Tournoi de l'Espoir</h4>
                                <span class="inline-block px-3 py-1 bg-gradient-to-r from-purple-500/20 to-blue-500/20 text-white text-sm rounded-full mb-3">Vainqueurs</span>
                                <p class="text-gray-300 mb-4">Premier titre pour notre jeune équipe lors du Tournoi de l'Espoir, avec 5 victoires consécutives et aucun but encaissé.</p>
                                <div class="flex items-center justify-end space-x-2">
                                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                                            <path d="M11.584 2.376a.75.75 0 01.832 0l9 6a.75.75 0 11-.832 1.248L12 3.901 3.416 9.624a.75.75 0 01-.832-1.248l9-6z" />
                                            <path fill-rule="evenodd" d="M20.25 10.332v9.918H21a.75.75 0 010 1.5H3a.75.75 0 010-1.5h.75v-9.918a.75.75 0 01.634-.74A49.109 49.109 0 0112 9c2.59 0 5.134.202 7.616.592a.75.75 0 01.634.74zm-7.5 2.418a.75.75 0 00-1.5 0v6.75a.75.75 0 001.5 0v-6.75zm3-.75a.75.75 0 01.75.75v6.75a.75.75 0 01-1.5 0v-6.75a.75.75 0 01.75-.75zM9 12.75a.75.75 0 00-1.5 0v6.75a.75.75 0 001.5 0v-6.75z" clip-rule="evenodd" />
                                            <path d="M12 7.875a1.125 1.125 0 100-2.25 1.125 1.125 0 000 2.25z" />
                                        </svg>
                                    </div>
                                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                                            <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Réalisation à droite -->
                        <div class="timeline-item mt-8 md:pl-16 relative achievement-right">
                            <div class="timeline-dot"></div>
                            <div class="bg-gradient-to-br from-gray-800 to-gray-900 p-6 rounded-xl shadow-lg transform transition-all duration-500 hover:shadow-purple-500/10 hover:-translate-y-1 border border-gray-700/50 achievement-card">
                                <h4 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">Championnat District</h4>
                                <span class="inline-block px-3 py-1 bg-gradient-to-r from-purple-500/20 to-blue-500/20 text-white text-sm rounded-full mb-3">3ème place</span>
                                <p class="text-gray-300 mb-4">Première participation au championnat de district avec une prometteuse troisième place, validant notre montée en division régionale.</p>
                                <div class="flex items-center space-x-2">
                                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                                            <path fill-rule="evenodd" d="M12.963 2.286a.75.75 0 00-1.071-.136 9.742 9.742 0 00-3.539 6.177A7.547 7.547 0 016.648 6.61a.75.75 0 00-1.152.082A9 9 0 1015.68 4.534a7.46 7.46 0 01-2.717-2.248zM15.75 14.25a3.75 3.75 0 11-7.313-1.172c.628.465 1.35.81 2.133 1a5.99 5.99 0 011.925-3.545 3.75 3.75 0 013.255 3.717z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                                            <path fill-rule="evenodd" d="M12.516 2.17a.75.75 0 00-1.032 0 11.209 11.209 0 01-7.877 3.08.75.75 0 00-.722.515A12.74 12.74 0 002.25 9.75c0 5.942 4.064 10.933 9.563 12.348a.75.75 0 00.374 0c5.499-1.415 9.563-6.406 9.563-12.348 0-1.39-.223-2.73-.635-3.985a.75.75 0 00-.722-.516l-.143.001c-2.996 0-5.717-1.17-7.734-3.08zm3.094 8.016a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- 2021 -->
                <div class="timeline-year">
                    <div class="relative grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-16">
                        <!-- Indicateur d'année -->
                        <div class="absolute left-1/2 transform -translate-x-1/2 top-0 w-16 h-16 rounded-full bg-gradient-to-br from-purple-500 to-blue-500 flex items-center justify-center shadow-lg shadow-purple-500/20 z-10">
                            <span class="text-white font-bold">2021</span>
                        </div>
                        
                        <!-- Espace à gauche -->
                        <div class="timeline-item md:text-right mt-20 md:mt-8 md:pr-16 relative"></div>
                        
                        <!-- Réalisation à droite -->
                        <div class="timeline-item mt-8 md:pl-16 relative achievement-right">
                            <div class="timeline-dot"></div>
                            <div class="bg-gradient-to-br from-gray-800 to-gray-900 p-6 rounded-xl shadow-lg transform transition-all duration-500 hover:shadow-purple-500/10 hover:-translate-y-1 border border-gray-700/50 achievement-card">
                                <h4 class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2">Création du FC Salvador</h4>
                                <span class="inline-block px-3 py-1 bg-gradient-to-r from-purple-500/20 to-blue-500/20 text-white text-sm rounded-full mb-3">Fondation</span>
                                <p class="text-gray-300 mb-4">Création officielle du club par un groupe de passionnés avec la vision de développer les jeunes talents de Kinshasa et de créer une équipe compétitive.</p>
                                <div class="flex items-center space-x-2">
                                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                                            <path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                                        </svg>
                                    </div>
                                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-blue-500 rounded-full flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                                            <path d="M11.7 2.805a.75.75 0 01.6 0A60.65 60.65 0 0122.83 8.72a.75.75 0 01-.231 1.337 49.949 49.949 0 00-9.902 3.912l-.003.002-.34.18a.75.75 0 01-.707 0A50.009 50.009 0 007.5 12.174v-.224c0-.131.067-.248.172-.311a54.614 54.614 0 014.653-2.52.75.75 0 00-.65-1.352 56.129 56.129 0 00-4.78 2.589 1.858 1.858 0 00-.859 1.228 49.803 49.803 0 00-4.634-1.527.75.75 0 01-.231-1.337A60.653 60.653 0 0111.7 2.805z" />
                                            <path d="M13.06 15.473a48.45 48.45 0 017.666-3.282c.134 1.414.22 2.843.255 4.285a.75.75 0 01-.46.71 47.878 47.878 0 00-8.105 4.342.75.75 0 01-.832 0 47.877 47.877 0 00-8.104-4.342.75.75 0 01-.461-.71c.035-1.442.121-2.87.255-4.286A48.4 48.4 0 016 13.18v1.27a1.5 1.5 0 00-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.661a6.729 6.729 0 00.551-1.608 1.5 1.5 0 00.14-2.67v-.645a48.549 48.549 0 013.44 1.668 2.25 2.25 0 002.12 0z" />
                                            <path d="M4.462 19.462c.42-.419.753-.89 1-1.394.453.213.902.434 1.347.661a6.743 6.743 0 01-1.286 1.794.75.75 0 11-1.06-1.06z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cartes de statistiques avec effet 3D -->
        <h3 class="text-3xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-10 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out delay-400" id="stats-title">
            Statistiques du FC Salvador
        </h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-20 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out delay-500" id="stats-cards">
            <!-- Carte Victoires -->
            <div class="stat-card">
                <div class="relative h-full p-1 rounded-xl bg-gradient-to-br from-purple-500 to-blue-500 overflow-hidden transform transition-all duration-500 hover:-translate-y-2 hover:rotate-1">
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="absolute inset-0 bg-blue-500/10 backdrop-blur-sm stat-card-bg"></div>
                    </div>
                    <div class="bg-gray-900 rounded-lg h-full p-6 relative z-10 flex flex-col items-center justify-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-blue-500 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-white">
                                <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h4 class="text-white text-xl font-bold mb-1">Victoires</h4>
                        <div class="counter text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2" data-target="38">0</div>
                        <p class="text-gray-400 text-center">Succès remportés en compétition officielle depuis notre création</p>
                    </div>
                </div>
            </div>
            
            <!-- Carte Buts -->
            <div class="stat-card">
                <div class="relative h-full p-1 rounded-xl bg-gradient-to-br from-purple-500 to-blue-500 overflow-hidden transform transition-all duration-500 hover:-translate-y-2 hover:rotate-1">
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="absolute inset-0 bg-blue-500/10 backdrop-blur-sm stat-card-bg"></div>
                    </div>
                    <div class="bg-gray-900 rounded-lg h-full p-6 relative z-10 flex flex-col items-center justify-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-blue-500 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-white">
                                <path d="M12.75 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM7.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM8.25 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM9.75 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM10.5 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM12.75 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM14.25 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 17.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 15.75a.75.75 0 100-1.5.75.75 0 000 1.5zM15 12.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM16.5 13.5a.75.75 0 100-1.5.75.75 0 000 1.5z" />
                                <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h4 class="text-white text-xl font-bold mb-1">Buts marqués</h4>
                        <div class="counter text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2" data-target="125">0</div>
                        <p class="text-gray-400 text-center">Buts inscrits par notre équipe depuis notre création</p>
                    </div>
                </div>
            </div>
            
            <!-- Carte Trophées -->
            <div class="stat-card">
                <div class="relative h-full p-1 rounded-xl bg-gradient-to-br from-purple-500 to-blue-500 overflow-hidden transform transition-all duration-500 hover:-translate-y-2 hover:rotate-1">
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="absolute inset-0 bg-blue-500/10 backdrop-blur-sm stat-card-bg"></div>
                    </div>
                    <div class="bg-gray-900 rounded-lg h-full p-6 relative z-10 flex flex-col items-center justify-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-blue-500 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-white">
                                <path fill-rule="evenodd" d="M5.166 2.621v.858c-1.035.148-2.059.33-3.071.543a.75.75 0 00-.584.859 6.937 6.937 0 006.431 5.232 6.953 6.953 0 002.992-.675.75.75 0 00.272-1.176A6.962 6.962 0 008.583 3.297a.75.75 0 00-.65.134c-.757.63-1.676.979-2.767.979z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M4.667 14.432a1 1 0 01.218 1.403A7.009 7.009 0 002.938 17.5h.764a.75.75 0 010 1.5H.75a.75.75 0 01-.75-.75V15.5a.75.75 0 011.5 0v.764a8.51 8.51 0 002.364-2.052 2.5 2.5 0 01.803-3.278 2.5 2.5 0 013.283.798l.007.01c.283.458.147.893-.052 1.103a8.017 8.017 0 01-3.038 1.587zM7.5 11.5a9 9 0 00-6.75 3.05V8.5a6 6 0 0111.91-1.01 8.646 8.646 0 01-3.91.76 7.497 7.497 0 01-1.25-.13z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M15.433 19.327a39.762 39.762 0 01-4.766 0 .75.75 0 01.75-.75 38.262 38.262 0 003.266 0 .75.75 0 01.75.75zm1.534-4.895a41.264 41.264 0 01-7.834 0 .75.75 0 01.75-.75 39.764 39.764 0 006.334 0 .75.75 0 01.75.75zm-4.917-8.019A39.763 39.763 0 0111 5.867a.75.75 0 01.75-.75 38.262 38.262 0 001.05.146.75.75 0 01-.75.75zM18 10.5a9 9 0 016.75 3.05V8.5a6 6 0 00-11.91-1.01c1.461.12 2.956.122 4.41 0 .736-.062 1.476-.138 2.248-.24.195-.026.39-.055.582-.084z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h4 class="text-white text-xl font-bold mb-1">Trophées</h4>
                        <div class="counter text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2" data-target="3">0</div>
                        <p class="text-gray-400 text-center">Titres remportés par le FC Salvador toutes compétitions confondues</p>
                    </div>
                </div>
            </div>
            
            <!-- Carte Joueurs -->
            <div class="stat-card">
                <div class="relative h-full p-1 rounded-xl bg-gradient-to-br from-purple-500 to-blue-500 overflow-hidden transform transition-all duration-500 hover:-translate-y-2 hover:rotate-1">
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="absolute inset-0 bg-blue-500/10 backdrop-blur-sm stat-card-bg"></div>
                    </div>
                    <div class="bg-gray-900 rounded-lg h-full p-6 relative z-10 flex flex-col items-center justify-center">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-blue-500 rounded-full flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-white">
                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h4 class="text-white text-xl font-bold mb-1">Joueurs formés</h4>
                        <div class="counter text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-2" data-target="32">0</div>
                        <p class="text-gray-400 text-center">Talents qui ont évolué sous nos couleurs depuis notre création</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Section records et distinctions -->
        <div class="bg-gradient-to-br from-gray-800/50 to-gray-900/50 backdrop-blur-sm rounded-2xl p-8 mb-20 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out delay-600" id="records-section">
            <h3 class="text-3xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-8">
                Records et distinctions
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Meilleurs buteurs -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-lg p-6 transform transition-all duration-500 hover:-translate-y-1 hover:shadow-purple-500/5 border border-gray-700/50">
                    <h4 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-4">
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2 text-purple-500">
                                <path d="M11.644 1.59a.75.75 0 01.712 0l9.75 5.25a.75.75 0 010 1.32l-9.75 5.25a.75.75 0 01-.712 0l-9.75-5.25a.75.75 0 010-1.32l9.75-5.25z" />
                                <path d="M3.265 10.602l7.668 4.129a2.25 2.25 0 002.134 0l7.668-4.13 1.37.739a.75.75 0 010 1.32l-9.75 5.25a.75.75 0 01-.71 0l-9.75-5.25a.75.75 0 010-1.32l1.37-.738z" />
                                <path d="M10.933 19.231l-7.668-4.13-1.37.739a.75.75 0 000 1.32l9.75 5.25c.221.12.489.12.71 0l9.75-5.25a.75.75 0 000-1.32l-1.37-.738-7.668 4.13a2.25 2.25 0 01-2.134-.001z" />
                            </svg>
                            Meilleurs buteurs
                        </span>
                    </h4>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-gray-900/50 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full overflow-hidden mr-3 border-2 border-purple-500">
                                    <img src="{{ asset('img/1740169349422.jpg') }}" alt="Sarah Mbuyi" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="text-white font-medium">Sarah Mbuyi</p>
                                    <p class="text-gray-400 text-xs">Attaquante</p>
                                </div>
                            </div>
                            <div class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500">42</div>
                        </div>
                        
                        <div class="flex items-center justify-between p-3 bg-gray-900/50 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full overflow-hidden mr-3 border-2 border-purple-500">
                                    <img src="{{ asset('img/1740169797146.jpg') }}" alt="Jean Kabasele" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="text-white font-medium">Jean Kabasele</p>
                                    <p class="text-gray-400 text-xs">Milieu offensif</p>
                                </div>
                            </div>
                            <div class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500">31</div>
                        </div>
                        
                        <div class="flex items-center justify-between p-3 bg-gray-900/50 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full overflow-hidden mr-3 border-2 border-purple-500">
                                    <img src="{{ asset('img/1740169523721.jpg') }}" alt="Patrick Nkulu" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <p class="text-white font-medium">Patrick Nkulu</p>
                                    <p class="text-gray-400 text-xs">Défenseur</p>
                                </div>
                            </div>
                            <div class="text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500">15</div>
                        </div>
                    </div>
                </div>
                
                <!-- Distinctions individuelles -->
                <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-lg p-6 transform transition-all duration-500 hover:-translate-y-1 hover:shadow-purple-500/5 border border-gray-700/50">
                    <h4 class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-4">
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2 text-purple-500">
                                <path fill-rule="evenodd" d="M12 1.5a.75.75 0 01.75.75V4.5a.75.75 0 01-1.5 0V2.25A.75.75 0 0112 1.5zM5.636 4.136a.75.75 0 011.06 0l1.592 1.591a.75.75 0 01-1.061 1.06l-1.591-1.59a.75.75 0 010-1.061zm12.728 0a.75.75 0 010 1.06l-1.591 1.592a.75.75 0 01-1.06-1.061l1.59-1.591a.75.75 0 011.061 0zm-6.816 4.496a.75.75 0 01.82.311l5.228 7.917a.75.75 0 01-.777 1.148l-2.097-.43 1.045 3.9a.75.75 0 01-1.45.388l-1.044-3.899-1.601 1.42a.75.75 0 01-1.247-.606l.569-9.47a.75.75 0 01.554-.68zM3 10.5a.75.75 0 01.75-.75H6a.75.75 0 010 1.5H3.75A.75.75 0 013 10.5zm14.25 0a.75.75 0 01.75-.75h2.25a.75.75 0 010 1.5H18a.75.75 0 01-.75-.75zm-8.962 3.712a.75.75 0 010 1.061l-1.591 1.591a.75.75 0 11-1.061-1.06l1.591-1.592a.75.75 0 011.06 0z" clip-rule="evenodd" />
                            </svg>
                            Distinctions individuelles
                        </span>
                    </h4>
                    <div class="space-y-4">
                        <div class="p-3 bg-gray-900/50 rounded-lg">
                            <div class="flex items-center justify-between mb-2">
                                <p class="text-white font-medium">Meilleur espoir du championnat 2023</p>
                                <span class="px-2 py-1 bg-purple-500/20 text-purple-300 text-xs rounded-full">2023</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full overflow-hidden mr-2 border border-purple-500">
                                    <img src="{{ asset('img/1740169797146.jpg') }}" alt="Jean Kabasele" class="w-full h-full object-cover">
                                </div>
                                <p class="text-gray-400 text-sm">Jean Kabasele</p>
                            </div>
                        </div>
                        
                        <div class="p-3 bg-gray-900/50 rounded-lg">
                            <div class="flex items-center justify-between mb-2">
                                <p class="text-white font-medium">Meilleure buteuse du tournoi municipal</p>
                                <span class="px-2 py-1 bg-purple-500/20 text-purple-300 text-xs rounded-full">2022</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full overflow-hidden mr-2 border border-purple-500">
                                    <img src="{{ asset('img/1740169349422.jpg') }}" alt="Sarah Mbuyi" class="w-full h-full object-cover">
                                </div>
                                <p class="text-gray-400 text-sm">Sarah Mbuyi (12 buts)</p>
                            </div>
                        </div>
                        
                        <div class="p-3 bg-gray-900/50 rounded-lg">
                            <div class="flex items-center justify-between mb-2">
                                <p class="text-white font-medium">Entraîneur de l'année - district</p>
                                <span class="px-2 py-1 bg-purple-500/20 text-purple-300 text-xs rounded-full">2022</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full overflow-hidden mr-2 border border-purple-500">
                                    <img src="{{ asset('img/1740169523721.jpg') }}" alt="Coach Patrick" class="w-full h-full object-cover">
                                </div>
                                <p class="text-gray-400 text-sm">Coach Patrick</p>
                            </div>
                        </div>
                        
                        <div class="p-3 bg-gray-900/50 rounded-lg">
                            <div class="flex items-center justify-between mb-2">
                                <p class="text-white font-medium">Équipe fair-play du tournoi</p>
                                <span class="px-2 py-1 bg-purple-500/20 text-purple-300 text-xs rounded-full">2023</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full overflow-hidden mr-2 border border-purple-500">
                                    <img src="{{ asset('img/1740169349422.jpg') }}" alt="FC Salvador" class="w-full h-full object-cover">
                                </div>
                                <p class="text-gray-400 text-sm">FC Salvador (équipe)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Galerie de moments mémorables avec effet 3D -->
        <h3 class="text-3xl font-bold text-center text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-8 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out delay-700" id="gallery-title">
            Moments mémorables
        </h3>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out delay-800" id="gallery-container">
            <!-- Moment mémorable 1 -->
            <div class="memorable-moment tilt-card">
                <div class="relative h-72 rounded-xl overflow-hidden transform transition-all duration-500 hover:shadow-xl hover:shadow-purple-500/10 tilt-card-inner">
                    <img src="{{ asset('img/1740169797146.jpg') }}" alt="Victoire championnat 2024" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                    <div class="absolute inset-0 p-6 flex flex-col justify-end">
                        <h4 class="text-white text-xl font-bold mb-2">Victoire du championnat 2024</h4>
                        <p class="text-gray-300 text-sm mb-4">L'équipe célèbre son triomphe après la victoire décisive contre FC Matete</p>
                        <div class="flex items-center text-gray-400 text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd" />
                            </svg>
                            10 Mai 2024
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Moment mémorable 2 -->
            <div class="memorable-moment tilt-card">
                <div class="relative h-72 rounded-xl overflow-hidden transform transition-all duration-500 hover:shadow-xl hover:shadow-purple-500/10 tilt-card-inner">
                    <img src="{{ asset('img/1740169523721.jpg') }}" alt="Finale coupe 2023" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                    <div class="absolute inset-0 p-6 flex flex-col justify-end">
                        <h4 class="text-white text-xl font-bold mb-2">Finale de la coupe 2023</h4>
                        <p class="text-gray-300 text-sm mb-4">La tension était palpable lors de la finale de la coupe municipale contre FC Kinshasa</p>
                        <div class="flex items-center text-gray-400 text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd" />
                            </svg>
                            23 Décembre 2023
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Moment mémorable 3 -->
            <div class="memorable-moment tilt-card">
                <div class="relative h-72 rounded-xl overflow-hidden transform transition-all duration-500 hover:shadow-xl hover:shadow-purple-500/10 tilt-card-inner">
                    <img src="{{ asset('img/1740169349422.jpg') }}" alt="Tournoi espoir 2022" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                    <div class="absolute inset-0 p-6 flex flex-col justify-end">
                        <h4 class="text-white text-xl font-bold mb-2">Tournoi de l'Espoir 2022</h4>
                        <p class="text-gray-300 text-sm mb-4">Premier titre de notre histoire avec un parcours parfait sans encaisser de but</p>
                        <div class="flex items-center text-gray-400 text-xs">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                                <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z" clip-rule="evenodd" />
                            </svg>
                            15 Août 2022
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bouton pour voir plus de moments -->
        <div class="flex justify-center mb-20 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out delay-900" id="view-more-container">
            <button class="px-8 py-3 bg-gradient-to-r from-purple-500 to-blue-500 text-white font-semibold rounded-full shadow-lg transform transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                Voir plus de moments mémorables
            </button>
        </div>
        
        <!-- Citation finale inspirante -->
        <div class="relative max-w-3xl mx-auto text-center opacity-0 transform translate-y-10 transition-all duration-1000 ease-out delay-1000" id="quote-container">
            <div class="absolute -top-6 left-0 text-7xl text-purple-500 opacity-20">"</div>
            <blockquote class="italic text-2xl font-light text-gray-300 mb-4 px-10">
                Chaque victoire est le fruit de notre travail, chaque défaite une leçon pour grandir. Notre plus belle réussite est de faire briller les talents de Kinshasa.
            </blockquote>
            <div class="flex items-center justify-center">
                <div class="w-12 h-12 rounded-full overflow-hidden mr-3 border-2 border-purple-500">
                    <img src="{{ asset('img/1740169523721.jpg') }}" alt="Coach Patrick" class="w-full h-full object-cover">
                </div>
                <p class="text-gray-400">
                    <span class="text-white font-semibold">Coach Patrick</span>
                    <br>
                    <span class="text-sm">Entraîneur FC Salvador</span>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Styles supplémentaires pour effets 3D et animations -->
<style>
    /* Effet de rotation 3D du trophée */
    .perspective {
        perspective: 1000px;
    }
    
    .transform-3d {
        transform-style: preserve-3d;
        transition: transform 0.7s ease-out;
    }
    
    .trophy-rotation:hover {
        transform: rotateY(15deg) rotateX(5deg);
    }
    
    .trophy-inner {
        transform-style: preserve-3d;
    }
    
    .trophy-bg {
        transition: all 0.5s ease;
    }
    
    .trophy-rotation:hover .trophy-bg {
        opacity: 0.7;
        transform: scale(1.1);
    }
    
    .trophy-text {
        transition: all 0.5s ease;
    }
    
    .trophy-rotation:hover .trophy-text {
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
    }
    
    .trophy-3d-object {
        animation: float 3s ease-in-out infinite;
        transform-style: preserve-3d;
    }
    
    .trophy-svg {
        filter: drop-shadow(0 0 10px rgba(234, 179, 8, 0.3));
        transition: all 0.5s ease;
    }
    
    .trophy-rotation:hover .trophy-svg {
        filter: drop-shadow(0 0 20px rgba(234, 179, 8, 0.5));
    }
    
    /* Effet de brillance sur le trophée */
    .trophy-shine {
        background: linear-gradient(
            135deg,
            rgba(255, 255, 255, 0) 20%,
            rgba(255, 255, 255, 0.25) 50%,
            rgba(255, 255, 255, 0) 80%
        );
        background-size: 200% 200%;
        animation: shine 4s infinite;
    }
    
    @keyframes shine {
        0% {
            background-position: -100% -100%;
        }
        100% {
            background-position: 200% 200%;
        }
    }
    
    @keyframes float {
        0%, 100% {
            transform: translateY(0) rotateY(0);
        }
        50% {
            transform: translateY(-10px) rotateY(5deg);
        }
    }
    
    /* Étoiles/particules d'arrière-plan pour le trophée */
    .stars-effect {
        background-image: radial-gradient(white, rgba(255, 255, 255, 0.2) 2px, transparent 3px);
        background-size: 50px 50px;
        animation: stars-animation 15s infinite linear;
    }
    
    @keyframes stars-animation {
        0% {
            background-position: 0 0;
        }
        100% {
            background-position: 50px 50px;
        }
    }
    
    /* Timeline styles */
    .timeline-line {
        z-index: 0;
    }
    
    .timeline-dot {
        position: absolute;
        width: 20px;
        height: 20px;
        background: linear-gradient(to right, #a855f7, #3b82f6);
        border-radius: 50%;
        top: 50%;
        z-index: 5;
    }
    
    .achievement-left .timeline-dot {
        right: -10px;
        transform: translateY(-50%);
    }
    
    .achievement-right .timeline-dot {
        left: -10px;
        transform: translateY(-50%);
    }
    
    .timeline-item {
        z-index: 1;
    }
    
    /* Effet de parallaxe pour les cartes de statistiques */
    .stat-card-bg {
        background-size: 200% 200%;
        animation: gradient-shift 8s ease infinite;
    }
    
    @keyframes gradient-shift {
        0% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
        100% {
            background-position: 0% 50%;
        }
    }
    
    /* Effet de carte avec inclinaison 3D */
    .tilt-card {
        perspective: 1500px;
    }
    
    .tilt-card-inner {
        transition: transform 0.4s ease-out;
    }
    
    .tilt-card:hover .tilt-card-inner {
        transform: scale(1.03) rotateY(5deg) rotateX(2deg);
    }
    
    /* Animation pour les chiffres de statistiques */
    @keyframes countUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .counter {
        animation: countUp 1s ease-out forwards;
    }
</style>

<!-- Script pour animations et effets 3D -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation des éléments au scroll
        function isElementInViewport(el) {
            const rect = el.getBoundingClientRect();
            return (
                rect.top <= (window.innerHeight || document.documentElement.clientHeight) * 0.85
            );
        }
        
        function animateVisibleElements() {
            // Sections principales
            const elements = [
                document.getElementById('achievements-title'),
                document.getElementById('achievements-subtitle'),
                document.getElementById('trophy-showcase'),
                document.getElementById('timeline-container'),
                document.getElementById('stats-title'),
                document.getElementById('stats-cards'),
                document.getElementById('records-section'),
                document.getElementById('gallery-title'),
                document.getElementById('gallery-container'),
                document.getElementById('view-more-container'),
                document.getElementById('quote-container')
            ];
            
            elements.forEach(element => {
                if (element && isElementInViewport(element) && element.classList.contains('opacity-0')) {
                    element.classList.remove('opacity-0');
                    element.classList.remove('translate-y-10');
                }
            });
        }
        
        // Effet de particules d'arrière-plan (version simplifiée via CSS)
        const particlesContainer = document.getElementById('particles-achievements');
        if (particlesContainer) {
            // Créer un conteneur pour les particules
            let particlesHTML = '';
            for (let i = 0; i < 50; i++) {
                const size = Math.random() * 4 + 1;
                const posX = Math.random() * 100;
                const posY = Math.random() * 100;
                const opacity = Math.random() * 0.8 + 0.2;
                const animDelay = Math.random() * 5;
                const animDuration = Math.random() * 10 + 10;
                
                particlesHTML += `<div class="absolute rounded-full bg-white" 
                                    style="width: ${size}px; height: ${size}px; top: ${posY}%; left: ${posX}%; 
                                    opacity: ${opacity}; animation: particle-float ${animDuration}s ${animDelay}s infinite linear;">
                                 </div>`;
            }
            particlesContainer.innerHTML = particlesHTML;
        }
        
        // Animation des compteurs
        function animateCounter(el) {
            const target = parseInt(el.getAttribute('data-target'));
            const count = +el.innerText;
            const speed = target / 100; // Plus la cible est grande, plus l'animation est rapide
            
            if (count < target) {
                el.innerText = Math.ceil(count + speed);
                setTimeout(() => animateCounter(el), 20);
            } else {
                el.innerText = target;
            }
        }
        
        const counters = document.querySelectorAll('.counter');
        
        function startCountersIfVisible() {
            counters.forEach(counter => {
                if (isElementInViewport(counter) && counter.innerHTML === "0") {
                    animateCounter(counter);
                }
            });
        }
        
        // Effet d'inclinaison 3D sur les cartes
        const tiltCards = document.querySelectorAll('.tilt-card');
        
        tiltCards.forEach(card => {
            const cardInner = card.querySelector('.tilt-card-inner');
            
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left; // position souris par rapport à la carte
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const percentX = (x - centerX) / centerX * 10; // -10 à +10
                const percentY = (y - centerY) / centerY * 10;
                
                cardInner.style.transform = `perspective(1000px) rotateY(${percentX}deg) rotateX(${-percentY}deg) scale3d(1.03, 1.03, 1.03)`;
            });
            
            card.addEventListener('mouseleave', () => {
                cardInner.style.transform = 'perspective(1000px) rotateY(0) rotateX(0) scale3d(1, 1, 1)';
            });
        });
        
        // Animer les éléments au chargement et au défilement
        animateVisibleElements();
        startCountersIfVisible();
        window.addEventListener('scroll', () => {
            animateVisibleElements();
            startCountersIfVisible();
        });
        
        // Animation CSS pour les particules flottantes
        const style = document.createElement('style');
        style.textContent = `
            @keyframes particle-float {
                0% {
                    transform: translateY(0) translateX(0);
                    opacity: 0.2;
                }
                25% {
                    transform: translateY(-30px) translateX(10px);
                    opacity: 0.6;
                }
                50% {
                    transform: translateY(-60px) translateX(-10px);
                    opacity: 0.2;
                }
                75% {
                    transform: translateY(-90px) translateX(10px);
                    opacity: 0.6;
                }
                100% {
                    transform: translateY(-120px) translateX(0);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
        
        // Gestion du clic sur "Voir plus de moments mémorables"
        const viewMoreBtn = document.querySelector('#view-more-container button');
        if (viewMoreBtn) {
            viewMoreBtn.addEventListener('click', function() {
                this.innerHTML = `
                    <span class="flex items-center">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>Chargement...</span>
                    </span>
                `;
                
                // Simuler un délai de chargement
                setTimeout(() => {
                    alert("Fonctionnalité de chargement de plus de moments mémorables à implémenter selon votre système de gestion de contenu.");
                    this.innerHTML = "Voir plus de moments mémorables";
                }, 1500);
            });
        }
    });
</script>


@endsection
