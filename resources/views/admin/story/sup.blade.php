<section id="storiesd" class="py-6 mb-16 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out" id="stories-section">
    <!--div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl md:text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500">Stories FC Salvador</h2>
                <div class="hidden md:flex space-x-2">
                    <button id="prev-story" class="px-3 py-2 bg-gray-700/50 text-white rounded-lg hover:bg-gray-600/50 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button id="next-story" class="px-3 py-2 bg-gray-700/50 text-white rounded-lg hover:bg-gray-600/50 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div-->
            
            <div class="stories-container mb-10">
                <div class="relative overflow-hidden">
                    <div class="flex space-x-4 pb-2 px-1 transition-transform duration-500 ease-out" id="stories-carousel">
                        <!-- Story 1 -->
                        <div class="story story-unseen min-w-[230px] md:min-w-[280px] h-[400px] rounded-xl" data-story-id="1" data-story-type="image" data-story-src="https://picsum.photos/id/237/800/1200" data-story-caption="Victoire écrasante contre Nice hier soir ! Notre équipe a brillé sur le terrain avec un score de 3-0. #FCSalvador #Victoire">
                            <div class="story-ring"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-black/10"></div>
                            <img src="https://picsum.photos/id/237/800/1200" alt="Story 1" class="w-full h-full object-cover">
                            <div class="absolute bottom-5 left-4 right-4">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-full overflow-hidden story-avatar">
                                        <img src="https://picsum.photos/id/177/200/200" alt="Avatar" class="w-full h-full object-cover">
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-white font-semibold">FC Salvador</div>
                                        <div class="text-gray-300 text-sm">Il y a 2 heures</div>
                                    </div>
                                </div>
                                <div class="mt-3 text-white text-sm line-clamp-2">Victoire écrasante contre Nice hier soir !</div>
                            </div>
                            <div class="absolute top-4 right-4 px-2 py-1 bg-purple-500/80 text-white text-xs font-medium rounded-full">Nouveau</div>
                        </div>
                        
                        <!-- Story 2 -->
                        <div class="story story-unseen min-w-[230px] md:min-w-[280px] h-[400px] rounded-xl" data-story-id="2" data-story-type="video" data-story-src="https://samplelib.com/lib/preview/mp4/sample-5s.mp4" data-story-caption="L'entraînement intensif continue ! Nos joueurs se préparent pour le match crucial de samedi. #Préparation #Champions">
                            <div class="story-ring"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-black/10"></div>
                            <video class="w-full h-full object-cover">
                                <source src="https://samplelib.com/lib/preview/mp4/sample-5s.mp4" type="video/mp4">
                            </video>
                            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-16 h-16 bg-black/50 backdrop-blur-sm rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="absolute bottom-5 left-4 right-4">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-full overflow-hidden story-avatar">
                                        <img src="https://picsum.photos/id/177/200/200" alt="Avatar" class="w-full h-full object-cover">
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-white font-semibold">FC Salvador</div>
                                        <div class="text-gray-300 text-sm">Il y a 5 heures</div>
                                    </div>
                                </div>
                                <div class="mt-3 text-white text-sm line-clamp-2">L'entraînement intensif continue !</div>
                            </div>
                            <div class="absolute top-4 right-4 px-2 py-1 bg-blue-500/80 text-white text-xs font-medium rounded-full">Vidéo</div>
                        </div>
                        
                        <!-- Story 3 -->
                        <div class="story story-unseen min-w-[230px] md:min-w-[280px] h-[400px] rounded-xl" data-story-id="3" data-story-type="image" data-story-src="https://picsum.photos/id/327/800/1200" data-story-caption="Notre nouveau maillot est disponible en vente ! Édition limitée inspirée de notre histoire. #NouveauMaillot #Élégance">
                            <div class="story-ring"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-black/10"></div>
                            <img src="https://picsum.photos/id/327/800/1200" alt="Story 3" class="w-full h-full object-cover">
                            <div class="absolute bottom-5 left-4 right-4">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-full overflow-hidden story-avatar">
                                        <img src="https://picsum.photos/id/177/200/200" alt="Avatar" class="w-full h-full object-cover">
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-white font-semibold">FC Salvador</div>
                                        <div class="text-gray-300 text-sm">Il y a 1 jour</div>
                                    </div>
                                </div>
                                <div class="mt-3 text-white text-sm line-clamp-2">Notre nouveau maillot est disponible !</div>
                            </div>
                        </div>
                        
                        <!-- Story 4 -->
                        <div class="story story-unseen min-w-[230px] md:min-w-[280px] h-[400px] rounded-xl" data-story-id="4" data-story-type="video" data-story-src="https://samplelib.com/lib/preview/mp4/sample-10s.mp4" data-story-caption="Moment magique ! But décisif de Rodriguez dans les dernières minutes du match contre Monaco. #TopButeur #MomentMagique">
                            <div class="story-ring"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-black/10"></div>
                            <video class="w-full h-full object-cover">
                                <source src="https://samplelib.com/lib/preview/mp4/sample-10s.mp4" type="video/mp4">
                            </video>
                            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-16 h-16 bg-black/50 backdrop-blur-sm rounded-full flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="absolute bottom-5 left-4 right-4">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-full overflow-hidden story-avatar">
                                        <img src="https://picsum.photos/id/177/200/200" alt="Avatar" class="w-full h-full object-cover">
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-white font-semibold">FC Salvador</div>
                                        <div class="text-gray-300 text-sm">Il y a 2 jours</div>
                                    </div>
                                </div>
                                <div class="mt-3 text-white text-sm line-clamp-2">Moment magique ! But décisif de Rodriguez</div>
                            </div>
                            <div class="absolute top-4 right-4 px-2 py-1 bg-blue-500/80 text-white text-xs font-medium rounded-full">Vidéo</div>
                        </div>
                        
                        <!-- Story 5 -->
                        <div class="story story-unseen min-w-[230px] md:min-w-[280px] h-[400px] rounded-xl" data-story-id="5" data-story-type="image" data-story-src="https://picsum.photos/id/127/800/1200" data-story-caption="Félicitations à notre gardien Carlos qui vient d'être nommé meilleur gardien du mois ! Une performance exceptionnelle avec 5 matchs sans encaisser de but. #MeilleurGardien #Talent">
                            <div class="story-ring"></div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-black/10"></div>
                            <img src="https://picsum.photos/id/127/800/1200" alt="Story 5" class="w-full h-full object-cover">
                            <div class="absolute bottom-5 left-4 right-4">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-full overflow-hidden story-avatar">
                                        <img src="https://picsum.photos/id/177/200/200" alt="Avatar" class="w-full h-full object-cover">
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-white font-semibold">FC Salvador</div>
                                        <div class="text-gray-300 text-sm">Il y a 3 jours</div>
                                    </div>
                                </div>
                                <div class="mt-3 text-white text-sm line-clamp-2">Félicitations à notre gardien Carlos !</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pagination des stories -->
                <div class="stories-pagination mt-6"></div>
            </div>
        </section>

        <!-- Modal Story -->
        <div class="story-modal" id="story-modal">
            <div class="story-close" id="story-close">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <div class="story-content">
                <div class="story-progress">
                    <!-- Les barres de progression seront générées dynamiquement -->
                </div>
                <div class="w-full h-full" id="story-player">
                    <!-- Le contenu de la story sera injecté ici -->
                </div>
                <div class="story-caption" id="story-caption"></div>
                
                <!-- Navigation de la story -->
                <div class="absolute inset-0 flex">
                    <div class="w-1/2 h-full cursor-pointer z-20" id="prev-slide"></div>
                    <div class="w-1/2 h-full cursor-pointer z-20" id="next-slide"></div>
                </div>
            </div>
        </div>
