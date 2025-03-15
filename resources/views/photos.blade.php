@extends('entete.base')
@section("contenus")


    <title>FC Salvador - Galerie Photos</title>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/build/three.min.js"></script>
    <style>
        
        
        /* Styles de base pour la galerie */
        .gallery-container {
            position: relative;
            min-height: 800px;
            padding-bottom: 60px;
        }
        
        .gallery-grid {
            transition: all 0.5s ease;
        }
        
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 0.75rem;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
            transform: scale(1);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2);
        }
        
        .gallery-item:hover {
            transform: scale(1.02);
            z-index: 10;
            box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.3), 0 0 15px 2px rgba(139, 92, 246, 0.3);
        }
        
        .gallery-item::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.1) 40%, rgba(0,0,0,0) 100%);
            opacity: 0.8;
            transition: opacity 0.3s ease;
            z-index: 2;
            pointer-events: none;
        }
        
        .gallery-item:hover::before {
            opacity: 0.5;
        }
        
        .gallery-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            transition: transform 0.8s ease;
        }
        
        .gallery-item:hover .gallery-image {
            transform: scale(1.1);
        }
        
        .gallery-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1rem;
            z-index: 3;
            transform: translateY(30%);
            transition: transform 0.3s ease;
            pointer-events: none;
        }
        
        .gallery-item:hover .gallery-info {
            transform: translateY(0);
        }
        
        .gallery-tags {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-top: 0.5rem;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease 0.1s;
        }
        
        .gallery-item:hover .gallery-tags {
            opacity: 1;
            transform: translateY(0);
        }
        
        .gallery-tag {
            position: relative;
            overflow: hidden;
        }
        
        .gallery-tag::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(45deg, rgba(139, 92, 246, 0.3), rgba(59, 130, 246, 0.3));
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .gallery-tag:hover::after {
            opacity: 1;
        }
        
        /* Lightbox styles */
        .lightbox {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 50;
            background-color: rgba(0, 0, 0, 0.9);
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }
        
        .lightbox.active {
            opacity: 1;
            pointer-events: auto;
        }
        
        .lightbox-content {
            position: relative;
            width: 100%;
            max-width: 1200px;
            height: 85vh;
            max-height: 800px;
            display: flex;
            flex-direction: column;
            background-color: #1f2937;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }
        
        .lightbox.active .lightbox-content {
            transform: scale(1);
        }
        
        .lightbox-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 1.5rem;
            background-color: rgba(17, 24, 39, 0.9);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            z-index: 2;
        }
        
        .lightbox-body {
            flex-grow: 1;
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #111827;
        }
        
        .lightbox-image {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
            transform: scale(1);
            transition: transform 0.3s ease;
        }
        
        .lightbox-footer {
            padding: 1rem 1.5rem;
            background-color: rgba(17, 24, 39, 0.9);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            z-index: 2;
        }
        
        .lightbox-close {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .lightbox-close:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
        
        .lightbox-nav-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 3;
        }
        
        .lightbox-nav-btn:hover {
            background-color: rgba(139, 92, 246, 0.6);
            transform: translateY(-50%) scale(1.1);
        }
        
        .lightbox-prev {
            left: 20px;
        }
        
        .lightbox-next {
            right: 20px;
        }
        
        .lightbox-thumbnails {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
            padding: 8px 16px;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            border-radius: 100px;
            overflow-x: auto;
            max-width: 90%;
            scrollbar-width: none;
            z-index: 3;
        }
        
        .lightbox-thumbnails::-webkit-scrollbar {
            display: none;
        }
        
        .thumbnail {
            width: 60px;
            height: 40px;
            border-radius: 4px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
            opacity: 0.6;
        }
        
        .thumbnail:hover {
            opacity: 1;
        }
        
        .thumbnail.active {
            border-color: #8B5CF6;
            opacity: 1;
            transform: scale(1.1);
        }
        
        .thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .zoom-controls {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            z-index: 3;
        }
        
        .zoom-btn {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .zoom-btn:hover {
            background-color: rgba(139, 92, 246, 0.6);
        }
        
        /* Filtres et recherche */
        .filters-container {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .filter-chip {
            transition: all 0.3s ease;
        }
        
        .filter-chip:hover {
            background: linear-gradient(to right, rgba(139, 92, 246, 0.5), rgba(59, 130, 246, 0.5));
            transform: translateY(-2px);
        }
        
        .filter-chip.active {
            background: linear-gradient(to right, #8B5CF6, #3B82F6);
            color: white;
            box-shadow: 0 4px 10px rgba(139, 92, 246, 0.4);
        }
        
        .search-box {
            position: relative;
        }
        
        .search-box input {
            padding-left: 40px;
            transition: all 0.3s ease;
        }
        
        .search-box input:focus {
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.3);
        }
        
        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #9CA3AF;
            pointer-events: none;
        }
        
        /* Hover video preview */
        .gallery-item[data-type="video"]::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 3;
            opacity: 0.8;
            transition: all 0.3s ease;
        }
        
        .gallery-item[data-type="video"]::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-40%, -50%);
            width: 0;
            height: 0;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            border-left: 18px solid white;
            z-index: 4;
            opacity: 0.8;
            transition: all 0.3s ease;
        }
        
        .gallery-item[data-type="video"]:hover::after {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1.1);
            background-color: rgba(139, 92, 246, 0.6);
        }
        
        .gallery-item[data-type="video"]:hover::before {
            opacity: 1;
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            opacity: 0;
            animation: fadeInUp 0.8s forwards;
        }
        
        .gallery-item {
            opacity: 0;
            transform: translateY(20px);
        }
        
        .gallery-item.visible {
            animation: fadeInUp 0.8s forwards;
        }
        
        @keyframes pulse {
            0%, 100% {
                opacity: 1;
                transform: scale(1);
            }
            50% {
                opacity: 0.8;
                transform: scale(1.05);
            }
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        /* Layout styles */
        .gallery-item.tall {
            grid-row: span 2;
        }
        
        .gallery-item.wide {
            grid-column: span 2;
        }
        
        /* Masonry layout */
        .masonry-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            grid-auto-rows: minmax(200px, auto);
            grid-auto-flow: dense;
            gap: 1.5rem;
        }
        
        /* Download button */
        .download-btn {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .download-btn::after {
            content: "";
            position: absolute;
            left: -100%;
            top: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, 
                transparent, 
                rgba(255, 255, 255, 0.2), 
                transparent);
            transition: left 0.6s ease;
        }
        
        .download-btn:hover::after {
            left: 100%;
        }
        
        /* Animations pour les boutons */
        .btn-animated {
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .btn-animated::before {
            content: "";
            position: absolute;
            z-index: -1;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, #8B5CF6, #3B82F6);
            transform: scaleX(0);
            transform-origin: 0 50%;
            transition: transform 0.6s ease-out;
            border-radius: 0.5rem;
        }
        
        .btn-animated:hover::before {
            transform: scaleX(1);
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: rgba(31, 41, 55, 0.8);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #8B5CF6, #3B82F6);
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #9C6EFF, #5A9FFF);
        }
        
        /* Responsive layout */
        @media (max-width: 768px) {
            .masonry-grid {
                grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            }
            
            .lightbox-content {
                width: 95%;
                height: 80vh;
            }
            
            .lightbox-thumbnails {
                max-width: 80%;
            }
            
            .thumbnail {
                width: 40px;
                height: 30px;
            }
            
            .gallery-item.wide, .gallery-item.tall {
                grid-column: span 1;
                grid-row: span 1;
            }
        }
        
        @media (max-width: 640px) {
            .masonry-grid {
                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
                gap: 1rem;
            }
            
            .lightbox-nav-btn {
                width: 36px;
                height: 36px;
            }
            
            .lightbox-prev {
                left: 10px;
            }
            
            .lightbox-next {
                right: 10px;
            }
            
            .gallery-info {
                padding: 0.75rem;
            }
        }
    </style>
</head>
<body class="min-h-screen">
    <div id="canvas-container"></div>
    
    <!-- Section Galerie Photo -->
    <section class="gallery-container pt-16 pb-24 px-4 sm:px-6 md:px-8 lg:px-12 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out" id="gallery-section">
        <div class="max-w-7xl mx-auto">
            <!-- Titre de la section -->
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-4">Galerie Photo FC Salvador</h2>
                <p class="text-gray-400 text-xl max-w-2xl mx-auto">Découvrez les moments forts de notre équipe à travers notre collection complète d'images et vidéos.</p>
            </div>
            
            <!-- Filtres et recherche -->
            <div class="filters-container mb-10 space-y-6">
                <!-- Recherche -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div class="search-box w-full sm:w-64 md:w-80 bg-gray-100 dark:bg-gray-900">
                        <span class="search-icon ">
                            <svg class="bg-gray-900 dark:bg-gray-100" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                        <input type="text" id="gallery-search" placeholder="Rechercher dans la galerie..." class="w-full bg-gray-700/50 text-white border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500">
                    </div>
                    
                    <!-- Boutons de vue -->
                    <div class="flex items-center space-x-2">
                        <button id="masonry-view" class="px-3 py-2 bg-gray-700/50 text-white rounded-lg hover:bg-gray-600/50 transition-all active">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                        </button>
                        <button id="grid-view" class="px-3 py-2 bg-gray-700/50 text-white rounded-lg hover:bg-gray-600/50 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                            </svg>
                        </button>
                        <button id="slides-view" class="px-3 py-2 bg-gray-700/50 text-white rounded-lg hover:bg-gray-600/50 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Catégories -->
                <div class="overflow-x-auto pb-2">
                    <div class="flex space-x-3 min-w-max">
                        <button class="filter-chip active py-2 px-4 bg-gray-700/50 rounded-full text-sm font-medium transition-all" data-filter="all">Tous</button>
                        <button class="filter-chip py-2 px-4 bg-gray-700/50 rounded-full text-sm font-medium transition-all" data-filter="match">Matchs</button>
                        <button class="filter-chip py-2 px-4 bg-gray-700/50 rounded-full text-sm font-medium transition-all" data-filter="training">Entraînements</button>
                        <button class="filter-chip py-2 px-4 bg-gray-700/50 rounded-full text-sm font-medium transition-all" data-filter="celebration">Célébrations</button>
                        <button class="filter-chip py-2 px-4 bg-gray-700/50 rounded-full text-sm font-medium transition-all" data-filter="travel">Déplacements</button>
                        <button class="filter-chip py-2 px-4 bg-gray-700/50 rounded-full text-sm font-medium transition-all" data-filter="fans">Supporters</button>
                        <button class="filter-chip py-2 px-4 bg-gray-700/50 rounded-full text-sm font-medium transition-all" data-filter="behind">Coulisses</button>
                        <button class="filter-chip py-2 px-4 bg-gray-700/50 rounded-full text-sm font-medium transition-all" data-filter="video">Vidéos</button>
                    </div>
                </div>
                
                <!-- Tri et filtres supplémentaires -->
                <div class="flex flex-wrap justify-between items-center gap-4">
                    <div class="flex items-center space-x-2">
                        <label for="sort-by" class="text-gray-400 text-sm">Trier par:</label>
                        <select id="sort-by" class="bg-gray-700/50 text-white border border-gray-600 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500 text-sm">
                            <option value="newest">Plus récents</option>
                            <option value="oldest">Plus anciens</option>
                            <option value="name-asc">Nom (A-Z)</option>
                            <option value="name-desc">Nom (Z-A)</option>
                        </select>
                    </div>
                    
                    <div class="flex space-x-2">
                        <button id="filter-season" class="btn-animated py-2 px-4 bg-gray-700/50 text-white rounded-lg text-sm font-medium transition-all flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Saison 2023-2024
                        </button>
                        
                        <button id="filter-advanced" class="btn-animated py-2 px-4 bg-gray-700/50 text-white rounded-lg text-sm font-medium transition-all flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                            </svg>
                            Filtres avancés
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Galerie Masonry -->
            <div class="gallery-grid masonry-grid" id="gallery-masonry">
                <!-- Item 1 -->
                <div class="gallery-item tall" data-category="match,celebration" data-date="2024-02-15" data-type="image" data-tags="championnat,victoire,équipe">
                    <img src="{{ asset('gallerie/img01.jpg') }}" alt="Victoire contre Nice" class="gallery-image">
                    <div class="gallery-info">
                        <h3 class="text-white font-semibold">Victoire contre Nice (3-0)</h3>
                        <p class="text-gray-300 text-sm">15 février 2024</p>
                        <div class="gallery-tags">
                            <span class="gallery-tag text-xs px-2 py-1 bg-purple-500/30 rounded-full text-purple-200">#Championnat</span>
                            <span class="gallery-tag text-xs px-2 py-1 bg-blue-500/30 rounded-full text-blue-200">#Victoire</span>
                        </div>
                    </div>
                </div>
                
                <!-- Item 2 -->
                <div class="gallery-item" data-category="match" data-date="2024-02-10" data-type="image" data-tags="championnat,équipe,action">
                    <img src="{{ asset('gallerie/img02.jpg') }}" alt="Match contre Marseille" class="gallery-image">
                    <div class="gallery-info">
                        <h3 class="text-white font-semibold">Match contre Marseille</h3>
                        <p class="text-gray-300 text-sm">10 février 2024</p>
                        <div class="gallery-tags">
                            <span class="gallery-tag text-xs px-2 py-1 bg-purple-500/30 rounded-full text-purple-200">#Championnat</span>
                            <span class="gallery-tag text-xs px-2 py-1 bg-gray-500/30 rounded-full text-gray-200">#Action</span>
                        </div>
                    </div>
                </div>
                
                <!-- Item 3 -->
                <div class="gallery-item wide" data-category="training" data-date="2024-02-07" data-type="image" data-tags="entraînement,équipe,préparation">
                    <img src="{{ asset('gallerie/img03.jpg') }}" alt="Entraînement collectif" class="gallery-image">
                    <div class="gallery-info">
                        <h3 class="text-white font-semibold">Entraînement collectif</h3>
                        <p class="text-gray-300 text-sm">7 février 2024</p>
                        <div class="gallery-tags">
                            <span class="gallery-tag text-xs px-2 py-1 bg-green-500/30 rounded-full text-green-200">#Entraînement</span>
                            <span class="gallery-tag text-xs px-2 py-1 bg-yellow-500/30 rounded-full text-yellow-200">#Préparation</span>
                        </div>
                    </div>
                </div>
                
                <!-- Item 4 -->
                <div class="gallery-item" data-category="fans" data-date="2024-02-05" data-type="image" data-tags="supporters,ambiance,stade">
                    <img src="{{ asset('gallerie/img04.jpg') }}" alt="Supporters au stade" class="gallery-image">
                    <div class="gallery-info">
                        <h3 class="text-white font-semibold">Nos supporters au stade</h3>
                        <p class="text-gray-300 text-sm">5 février 2024</p>
                        <div class="gallery-tags">
                            <span class="gallery-tag text-xs px-2 py-1 bg-red-500/30 rounded-full text-red-200">#Supporters</span>
                            <span class="gallery-tag text-xs px-2 py-1 bg-orange-500/30 rounded-full text-orange-200">#Ambiance</span>
                        </div>
                    </div>
                </div>
                
                <!-- Item 5 -->
                <div class="gallery-item" data-category="match,celebration" data-date="2024-02-01" data-type="video" data-tags="championnat,but,célébration" data-video-src="https://samplelib.com/lib/preview/mp4/sample-5s.mp4">
                    <img src="{{ asset('gallerie/img05.jpg') }}" alt="But de Rodriguez" class="gallery-image">
                    <div class="gallery-info">
                        <h3 class="text-white font-semibold">But décisif de Rodriguez</h3>
                        <p class="text-gray-300 text-sm">1 février 2024</p>
                        <div class="gallery-tags">
                            <span class="gallery-tag text-xs px-2 py-1 bg-purple-500/30 rounded-full text-purple-200">#Championnat</span>
                            <span class="gallery-tag text-xs px-2 py-1 bg-pink-500/30 rounded-full text-pink-200">#But</span>
                        </div>
                    </div>
                </div>
                
                <!-- Item 6 -->
                <div class="gallery-item wide tall" data-category="behind" data-date="2024-01-28" data-type="image" data-tags="coulisses,vestiaire,équipe">
                    <img src="{{ asset('gallerie/img1.jpg') }}" alt="Dans les vestiaires" class="gallery-image">
                    <div class="gallery-info">
                        <h3 class="text-white font-semibold">Dans les vestiaires</h3>
                        <p class="text-gray-300 text-sm">28 janvier 2024</p>
                        <div class="gallery-tags">
                            <span class="gallery-tag text-xs px-2 py-1 bg-indigo-500/30 rounded-full text-indigo-200">#Coulisses</span>
                            <span class="gallery-tag text-xs px-2 py-1 bg-gray-500/30 rounded-full text-gray-200">#Vestiaire</span>
                        </div>
                    </div>
                </div>
                
                <!-- Item 7 -->
                <div class="gallery-item" data-category="travel" data-date="2024-01-25" data-type="image" data-tags="déplacement,voyage,équipe">
                    <img src="{{ asset('gallerie/img2.jpg') }}" alt="Départ pour Munich" class="gallery-image">
                    <div class="gallery-info">
                        <h3 class="text-white font-semibold">Départ pour Munich</h3>
                        <p class="text-gray-300 text-sm">25 janvier 2024</p>
                        <div class="gallery-tags">
                            <span class="gallery-tag text-xs px-2 py-1 bg-blue-500/30 rounded-full text-blue-200">#Déplacement</span>
                            <span class="gallery-tag text-xs px-2 py-1 bg-teal-500/30 rounded-full text-teal-200">#Voyage</span>
                        </div>
                    </div>
                </div>
                
                <!-- Item 8 -->
                <div class="gallery-item" data-category="training" data-date="2024-01-20" data-type="video" data-tags="entraînement,exercice,technique" data-video-src="https://samplelib.com/lib/preview/mp4/sample-10s.mp4">
                    <img src="{{ asset('gallerie/img3.jpg') }}" alt="Exercices techniques" class="gallery-image">
                    <div class="gallery-info">
                        <h3 class="text-white font-semibold">Exercices techniques</h3>
                        <p class="text-gray-300 text-sm">20 janvier 2024</p>
                        <div class="gallery-tags">
                            <span class="gallery-tag text-xs px-2 py-1 bg-green-500/30 rounded-full text-green-200">#Entraînement</span>
                            <span class="gallery-tag text-xs px-2 py-1 bg-yellow-500/30 rounded-full text-yellow-200">#Technique</span>
                        </div>
                    </div>
                </div>
                
                <!-- Item 9 -->
                <div class="gallery-item" data-category="behind" data-date="2024-01-15" data-type="image" data-tags="coulisses,équipe,préparation">
                    <img src="{{ asset('gallerie/img4.jpg') }}" alt="Préparation d'avant-match" class="gallery-image">
                    <div class="gallery-info">
                        <h3 class="text-white font-semibold">Préparation d'avant-match</h3>
                        <p class="text-gray-300 text-sm">15 janvier 2024</p>
                        <div class="gallery-tags">
                            <span class="gallery-tag text-xs px-2 py-1 bg-indigo-500/30 rounded-full text-indigo-200">#Coulisses</span>
                            <span class="gallery-tag text-xs px-2 py-1 bg-yellow-500/30 rounded-full text-yellow-200">#Préparation</span>
                        </div>
                    </div>
                </div>
                
                <!-- Item 10 -->
                <div class="gallery-item tall" data-category="celebration" data-date="2024-01-10" data-type="image" data-tags="trophée,victoire,célébration">
                    <img src="{{ asset('gallerie/img5.jpg') }}" alt="Supercoupe - Victoire" class="gallery-image">
                    <div class="gallery-info">
                        <h3 class="text-white font-semibold">Victoire en Supercoupe</h3>
                        <p class="text-gray-300 text-sm">10 janvier 2024</p>
                        <div class="gallery-tags">
                            <span class="gallery-tag text-xs px-2 py-1 bg-purple-500/30 rounded-full text-purple-200">#Trophée</span>
                            <span class="gallery-tag text-xs px-2 py-1 bg-blue-500/30 rounded-full text-blue-200">#Victoire</span>
                        </div>
                    </div>
                </div>
                
                <!-- Item 11 -->
                <div class="gallery-item wide" data-category="fans" data-date="2024-01-05" data-type="image" data-tags="supporters,ambiance,célébration">
                    <img src="{{ asset('gallerie/img6.jpg') }}" alt="Célébration avec les fans" class="gallery-image">
                    <div class="gallery-info">
                        <h3 class="text-white font-semibold">Célébration avec les fans</h3>
                        <p class="text-gray-300 text-sm">5 janvier 2024</p>
                        <div class="gallery-tags">
                            <span class="gallery-tag text-xs px-2 py-1 bg-red-500/30 rounded-full text-red-200">#Supporters</span>
                            <span class="gallery-tag text-xs px-2 py-1 bg-pink-500/30 rounded-full text-pink-200">#Célébration</span>
                        </div>
                    </div>
                </div>
                
                <!-- Item 12 -->
                <div class="gallery-item" data-category="match" data-date="2023-12-20" data-type="video" data-tags="championnat,action,résumé" data-video-src="https://samplelib.com/lib/preview/mp4/sample-15s.mp4">
                    <img src="{{ asset('gallerie/img7.jpg') }}" alt="Résumé match Nantes" class="gallery-image">
                    <div class="gallery-info">
                        <h3 class="text-white font-semibold">Résumé match vs Nantes</h3>
                        <p class="text-gray-300 text-sm">20 décembre 2023</p>
                        <div class="gallery-tags">
                            <span class="gallery-tag text-xs px-2 py-1 bg-purple-500/30 rounded-full text-purple-200">#Championnat</span>
                            <span class="gallery-tag text-xs px-2 py-1 bg-gray-500/30 rounded-full text-gray-200">#Résumé</span>
                        </div>
                    </div>
                </div>
                
                <!-- Item 13 -->
                <div class="gallery-item" data-category="celebration,behind" data-date="2023-12-15" data-type="image" data-tags="anniversaire,équipe,célébration">
                    <img src="{{ asset('gallerie/img8.jpg') }}" alt="Anniversaire du club" class="gallery-image">
                    <div class="gallery-info">
                        <h3 class="text-white font-semibold">35 ans du FC Salvador</h3>
                        <p class="text-gray-300 text-sm">15 décembre 2023</p>
                        <div class="gallery-tags">
                            <span class="gallery-tag text-xs px-2 py-1 bg-pink-500/30 rounded-full text-pink-200">#Anniversaire</span>
                            <span class="gallery-tag text-xs px-2 py-1 bg-indigo-500/30 rounded-full text-indigo-200">#Célébration</span>
                        </div>
                    </div>
                </div>
                
                <!-- Item 14 -->
                <div class="gallery-item wide" data-category="training" data-date="2023-12-10" data-type="image" data-tags="entraînement,préparation,physique">
                    <img src="{{ asset('gallerie/img9.jpg') }}" alt="Préparation physique" class="gallery-image">
                    <div class="gallery-info">
                        <h3 class="text-white font-semibold">Préparation physique</h3>
                        <p class="text-gray-300 text-sm">10 décembre 2023</p>
                        <div class="gallery-tags">
                            <span class="gallery-tag text-xs px-2 py-1 bg-green-500/30 rounded-full text-green-200">#Entraînement</span>
                            <span class="gallery-tag text-xs px-2 py-1 bg-yellow-500/30 rounded-full text-yellow-200">#Physique</span>
                        </div>
                    </div>
                </div>
                
                <!-- Item 15 -->
                <div class="gallery-item" data-category="travel" data-date="2023-12-05" data-type="image" data-tags="déplacement,voyage,équipe">
                    <img src="{{ asset('gallerie/img10.jpg') }}" alt="Arrivée à Amsterdam" class="gallery-image">
                    <div class="gallery-info">
                        <h3 class="text-white font-semibold">Arrivée à Amsterdam</h3>
                        <p class="text-gray-300 text-sm">5 décembre 2023</p>
                        <div class="gallery-tags">
                            <span class="gallery-tag text-xs px-2 py-1 bg-blue-500/30 rounded-full text-blue-200">#Déplacement</span>
                            <span class="gallery-tag text-xs px-2 py-1 bg-teal-500/30 rounded-full text-teal-200">#Champions League</span>
                        </div>
                    </div>
                </div>
                
                <!-- Item 16 -->
                <div class="gallery-item tall" data-category="fans" data-date="2023-11-25" data-type="image" data-tags="supporters,tribune,ambiance">
                    <img src="{{ asset('gallerie/img11.jpg') }}" alt="Tribune des supporters" class="gallery-image">
                    <div class="gallery-info">
                        <h3 class="text-white font-semibold">Tribune Nord en feu</h3>
                        <p class="text-gray-300 text-sm">25 novembre 2023</p>
                        <div class="gallery-tags">
                            <span class="gallery-tag text-xs px-2 py-1 bg-red-500/30 rounded-full text-red-200">#Supporters</span>
                            <span class="gallery-tag text-xs px-2 py-1 bg-orange-500/30 rounded-full text-orange-200">#Ambiance</span>
                        </div>
                    </div>
                </div>

                <div class="gallery-item tall" data-category="fans" data-date="2023-11-25" data-type="image" data-tags="supporters,tribune,ambiance">
                    <img src="{{ asset('gallerie/img12.jpg') }}" alt="Tribune des supporters" class="gallery-image">
                    <div class="gallery-info">
                        <h3 class="text-white font-semibold">Tribune Nord en feu</h3>
                        <p class="text-gray-300 text-sm">25 novembre 2023</p>
                        <div class="gallery-tags">
                            <span class="gallery-tag text-xs px-2 py-1 bg-red-500/30 rounded-full text-red-200">#Supporters</span>
                            <span class="gallery-tag text-xs px-2 py-1 bg-orange-500/30 rounded-full text-orange-200">#Ambiance</span>
                        </div>
                    </div>
                </div>

                <div class="gallery-item tall" data-category="fans" data-date="2023-11-25" data-type="image" data-tags="supporters,tribune,ambiance">
                    <img src="{{ asset('gallerie/img13.jpg') }}" alt="Tribune des supporters" class="gallery-image">
                    <div class="gallery-info">
                        <h3 class="text-white font-semibold">Tribune Nord en feu</h3>
                        <p class="text-gray-300 text-sm">25 novembre 2023</p>
                        <div class="gallery-tags">
                            <span class="gallery-tag text-xs px-2 py-1 bg-red-500/30 rounded-full text-red-200">#Supporters</span>
                            <span class="gallery-tag text-xs px-2 py-1 bg-orange-500/30 rounded-full text-orange-200">#Ambiance</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Bouton Voir plus -->
            <!--div class="flex justify-center mt-10">
                <button id="load-more" class="px-6 py-3 bg-gradient-to-r from-purple-500 to-blue-500 text-white font-semibold rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                    Charger plus de photos
                </button>
            </div-->
        </div>
    </section>
    
    <!-- Lightbox Gallery -->
    <div class="lightbox" id="gallery-lightbox">
        <div class="lightbox-content">
            <div class="lightbox-header">
                <div>
                    <h3 class="text-lg font-semibold" id="lightbox-title">Titre de l'image</h3>
                    <p class="text-sm text-gray-400" id="lightbox-date">Date</p>
                </div>
                <div class="lightbox-close" id="lightbox-close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
            
            <div class="lightbox-body">
                <div id="lightbox-content">
                    <!-- Contenu dynamique -->
                </div>
                
                <!-- Navigation -->
                <div class="lightbox-nav-btn lightbox-prev" id="lightbox-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </div>
                <div class="lightbox-nav-btn lightbox-next" id="lightbox-next">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
                
                <!-- Contrôles de zoom -->
                <div class="zoom-controls">
                    <div class="zoom-btn" id="zoom-in">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                    </div>
                    <div class="zoom-btn" id="zoom-out">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 12H6" />
                        </svg>
                    </div>
                    <div class="zoom-btn" id="zoom-reset">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                </div>
            </div>
            
            <div class="lightbox-footer">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                    <div>
                        <div class="flex flex-wrap gap-2">
                            <span class="gallery-tag text-xs px-2 py-1 bg-purple-500/30 rounded-full text-purple-200" id="lightbox-tag1">#Tag1</span>
                            <span class="gallery-tag text-xs px-2 py-1 bg-blue-500/30 rounded-full text-blue-200" id="lightbox-tag2">#Tag2</span>
                            <span class="gallery-tag text-xs px-2 py-1 bg-green-500/30 rounded-full text-green-200" id="lightbox-tag3">#Tag3</span>
                        </div>
                    </div>
                    
                    <div class="flex gap-2">
                        <button id="share-btn" class="py-2 px-3 bg-gray-700/70 hover:bg-gray-600 text-white rounded-lg text-sm font-medium transition-all flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                            </svg>
                            Partager
                        </button>
                        
                        <a id="download-btn" href="#" class="download-btn py-2 px-3 bg-gradient-to-r from-purple-500 to-blue-500 hover:from-purple-600 hover:to-blue-600 text-white rounded-lg text-sm font-medium transition-all flex items-center" download>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Télécharger
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Thumbnails -->
            <div class="lightbox-thumbnails" id="lightbox-thumbnails">
                <!-- Les miniatures seront générées dynamiquement -->
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Animations d'entrée
            setTimeout(() => {
                document.getElementById('gallery-section').classList.remove('opacity-0', 'translate-y-10');
                animateGalleryItems();
            }, 300);
            
            // Initialisation de la galerie
            initGallery();
        });
        
        // Animation des éléments de la galerie
        function animateGalleryItems() {
            const items = document.querySelectorAll('.gallery-item');
            
            items.forEach((item, index) => {
                setTimeout(() => {
                    item.classList.add('visible');
                }, 100 * index);
            });
        }
        
        // Initialisation de la galerie
        function initGallery() {
            const galleryItems = document.querySelectorAll('.gallery-item');
            const filterChips = document.querySelectorAll('.filter-chip');
            const searchInput = document.getElementById('gallery-search');
            const sortSelect = document.getElementById('sort-by');
            const loadMoreBtn = document.getElementById('load-more');
            const lightbox = document.getElementById('gallery-lightbox');
            const lightboxClose = document.getElementById('lightbox-close');
            const lightboxContent = document.getElementById('lightbox-content');
            const lightboxTitle = document.getElementById('lightbox-title');
            const lightboxDate = document.getElementById('lightbox-date');
            const lightboxPrev = document.getElementById('lightbox-prev');
            const lightboxNext = document.getElementById('lightbox-next');
            const lightboxThumbnails = document.getElementById('lightbox-thumbnails');
            const zoomIn = document.getElementById('zoom-in');
            const zoomOut = document.getElementById('zoom-out');
            const zoomReset = document.getElementById('zoom-reset');
            const downloadBtn = document.getElementById('download-btn');
            const shareBtn = document.getElementById('share-btn');
            const masonryView = document.getElementById('masonry-view');
            const gridView = document.getElementById('grid-view');
            const slidesView = document.getElementById('slides-view');
            
            let currentFilter = 'all';
            let currentSearch = '';
            let currentSort = 'newest';
            let currentLightboxIndex = 0;
            let filteredItems = [...galleryItems];
            let zoomLevel = 1;
            
            // Initialiser les miniatures du lightbox
            function initThumbnails() {
                lightboxThumbnails.innerHTML = '';
                
                filteredItems.forEach((item, index) => {
                    const imgSrc = item.querySelector('.gallery-image').src;
                    const thumbnail = document.createElement('div');
                    thumbnail.className = 'thumbnail';
                    if (index === currentLightboxIndex) thumbnail.classList.add('active');
                    
                    const img = document.createElement('img');
                    img.src = imgSrc;
                    img.alt = 'Miniature';
                    
                    thumbnail.appendChild(img);
                    thumbnail.addEventListener('click', () => {
                        currentLightboxIndex = index;
                        updateLightbox();
                    });
                    
                    lightboxThumbnails.appendChild(thumbnail);
                });
            }
            
            // Ouverture du lightbox
            function openLightbox(index) {
                currentLightboxIndex = index;
                updateLightbox();
                lightbox.classList.add('active');
                document.body.style.overflow = 'hidden';
            }
            
            // Mise à jour du lightbox
            function updateLightbox() {
                const item = filteredItems[currentLightboxIndex];
                const title = item.querySelector('.gallery-info h3').textContent;
                const date = item.querySelector('.gallery-info p').textContent;
                const type = item.getAttribute('data-type');
                const tags = item.getAttribute('data-tags').split(',');
                
                lightboxTitle.textContent = title;
                lightboxDate.textContent = date;
                lightboxContent.innerHTML = '';
                zoomLevel = 1;
                
                // Mise à jour des tags
                const tagElements = document.querySelectorAll('#lightbox-tag1, #lightbox-tag2, #lightbox-tag3');
                tagElements.forEach((tagEl, i) => {
                    if (tags[i]) {
                        tagEl.textContent = `#${tags[i]}`;
                        tagEl.style.display = 'inline-flex';
                    } else {
                        tagEl.style.display = 'none';
                    }
                });
                
                // Contenu selon le type
                if (type === 'image') {
                    const img = document.createElement('img');
                    img.className = 'lightbox-image';
                    img.src = item.querySelector('.gallery-image').src;
                    img.alt = title;
                    img.style.transform = `scale(${zoomLevel})`;
                    lightboxContent.appendChild(img);
                    
                    // Mettre à jour le bouton de téléchargement
                    downloadBtn.href = img.src;
                    downloadBtn.download = `fc-salvador-${title.toLowerCase().replace(/\s+/g, '-')}.jpg`;
                } else if (type === 'video') {
                    const video = document.createElement('video');
                    video.className = 'lightbox-image';
                    video.controls = true;
                    video.autoplay = true;
                    
                    const source = document.createElement('source');
                    source.src = item.getAttribute('data-video-src');
                    source.type = 'video/mp4';
                    
                    video.appendChild(source);
                    lightboxContent.appendChild(video);
                    
                    // Mettre à jour le bouton de téléchargement
                    downloadBtn.href = source.src;
                    downloadBtn.download = `fc-salvador-${title.toLowerCase().replace(/\s+/g, '-')}.mp4`;
                }
                
                // Mise à jour des miniatures
                const thumbnails = lightboxThumbnails.querySelectorAll('.thumbnail');
                thumbnails.forEach((thumb, idx) => {
                    if (idx === currentLightboxIndex) {
                        thumb.classList.add('active');
                    } else {
                        thumb.classList.remove('active');
                    }
                });
                
                // Mise à jour des boutons de navigation
                lightboxPrev.style.display = currentLightboxIndex > 0 ? 'flex' : 'none';
                lightboxNext.style.display = currentLightboxIndex < filteredItems.length - 1 ? 'flex' : 'none';
            }
            
            // Fermeture du lightbox
            function closeLightbox() {
                lightbox.classList.remove('active');
                document.body.style.overflow = '';
                
                // Arrêter la vidéo si en cours de lecture
                const video = lightboxContent.querySelector('video');
                if (video) video.pause();
            }
            
            // Navigation dans le lightbox
            lightboxPrev.addEventListener('click', () => {
                if (currentLightboxIndex > 0) {
                    currentLightboxIndex--;
                    updateLightbox();
                }
            });
            
            lightboxNext.addEventListener('click', () => {
                if (currentLightboxIndex < filteredItems.length - 1) {
                    currentLightboxIndex++;
                    updateLightbox();
                }
            });
            
            // Navigation au clavier
            document.addEventListener('keydown', (e) => {
                if (lightbox.classList.contains('active')) {
                    if (e.key === 'ArrowLeft') {
                        if (currentLightboxIndex > 0) {
                            currentLightboxIndex--;
                            updateLightbox();
                        }
                    } else if (e.key === 'ArrowRight') {
                        if (currentLightboxIndex < filteredItems.length - 1) {
                            currentLightboxIndex++;
                            updateLightbox();
                        }
                    } else if (e.key === 'Escape') {
                        closeLightbox();
                    }
                }
            });
            
            // Fermeture du lightbox
            lightboxClose.addEventListener('click', closeLightbox);
            lightbox.addEventListener('click', (e) => {
                if (e.target === lightbox) {
                    closeLightbox();
                }
            });
            
            // Contrôles de zoom
            zoomIn.addEventListener('click', () => {
                const img = lightboxContent.querySelector('.lightbox-image');
                if (img && zoomLevel < 3) {
                    zoomLevel += 0.2;
                    img.style.transform = `scale(${zoomLevel})`;
                }
            });
            
            zoomOut.addEventListener('click', () => {
                const img = lightboxContent.querySelector('.lightbox-image');
                if (img && zoomLevel > 0.5) {
                    zoomLevel -= 0.2;
                    img.style.transform = `scale(${zoomLevel})`;
                }
            });
            
            zoomReset.addEventListener('click', () => {
                const img = lightboxContent.querySelector('.lightbox-image');
                if (img) {
                    zoomLevel = 1;
                    img.style.transform = `scale(${zoomLevel})`;
                }
            });
            
            // Partage
            shareBtn.addEventListener('click', async () => {
                const item = filteredItems[currentLightboxIndex];
                const title = item.querySelector('.gallery-info h3').textContent;
                const imageSrc = item.querySelector('.gallery-image').src;
                
                if (navigator.share) {
                    try {
                        await navigator.share({
                            title: `FC Salvador - ${title}`,
                            text: 'Découvrez les photos de notre équipe !',
                            url: window.location.href,
                        });
                    } catch (error) {
                        console.log('Erreur de partage:', error);
                    }
                } else {
                    // Fallback pour les navigateurs qui ne supportent pas l'API Web Share
                    alert('Fonctionnalité de partage non supportée par votre navigateur');
                }
            });
            
            // Filtrage par catégorie
            filterChips.forEach(chip => {
                chip.addEventListener('click', () => {
                    // Mise à jour de l'UI
                    filterChips.forEach(c => c.classList.remove('active'));
                    chip.classList.add('active');
                    
                    // Appliquer le filtre
                    currentFilter = chip.getAttribute('data-filter');
                    applyFilters();
                });
            });
            
            // Recherche
            searchInput.addEventListener('input', () => {
                currentSearch = searchInput.value.toLowerCase();
                applyFilters();
            });
            
            // Tri
            sortSelect.addEventListener('change', () => {
                currentSort = sortSelect.value;
                applyFilters();
            });
            
            // Appliquer les filtres
            function applyFilters() {
                // Filtrer par catégorie et recherche
                filteredItems = [...galleryItems].filter(item => {
                    const categories = item.getAttribute('data-category').split(',');
                    const matchesFilter = currentFilter === 'all' || categories.includes(currentFilter);
                    
                    const title = item.querySelector('.gallery-info h3').textContent.toLowerCase();
                    const tags = item.getAttribute('data-tags').toLowerCase();
                    const matchesSearch = currentSearch === '' || 
                                         title.includes(currentSearch) || 
                                         tags.includes(currentSearch);
                    
                    return matchesFilter && matchesSearch;
                });
                
                // Trier les éléments
                filteredItems.sort((a, b) => {
                    const dateA = new Date(a.getAttribute('data-date'));
                    const dateB = new Date(b.getAttribute('data-date'));
                    const titleA = a.querySelector('.gallery-info h3').textContent;
                    const titleB = b.querySelector('.gallery-info h3').textContent;
                    
                    switch (currentSort) {
                        case 'newest':
                            return dateB - dateA;
                        case 'oldest':
                            return dateA - dateB;
                        case 'name-asc':
                            return titleA.localeCompare(titleB);
                        case 'name-desc':
                            return titleB.localeCompare(titleA);
                        default:
                            return 0;
                    }
                });
                
                // Afficher les éléments filtrés
                galleryItems.forEach(item => {
                    item.style.display = 'none';
                });
                
                filteredItems.forEach(item => {
                    item.style.display = 'block';
                });
                
                // Mettre à jour les miniatures si le lightbox est ouvert
                if (lightbox.classList.contains('active')) {
                    initThumbnails();
                    
                    // Ajuster l'index si nécessaire
                    if (currentLightboxIndex >= filteredItems.length) {
                        currentLightboxIndex = filteredItems.length - 1;
                    }
                    
                    if (filteredItems.length > 0) {
                        updateLightbox();
                    } else {
                        closeLightbox();
                    }
                }
            }
            
            // Gérer le changement de vue
            masonryView.addEventListener('click', () => {
                const galleryGrid = document.getElementById('gallery-masonry');
                galleryGrid.className = 'gallery-grid masonry-grid';
                
                masonryView.classList.add('active');
                gridView.classList.remove('active');
                slidesView.classList.remove('active');
            });
            
            gridView.addEventListener('click', () => {
                const galleryGrid = document.getElementById('gallery-masonry');
                galleryGrid.className = 'gallery-grid grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4';
                
                masonryView.classList.remove('active');
                gridView.classList.add('active');
                slidesView.classList.remove('active');
                
                // Réinitialiser les spans pour la vue grille
                galleryItems.forEach(item => {
                    item.classList.remove('tall', 'wide');
                });
            });
            
            slidesView.addEventListener('click', () => {
                const galleryGrid = document.getElementById('gallery-masonry');
                galleryGrid.className = 'gallery-grid flex flex-col space-y-6';
                
                masonryView.classList.remove('active');
                gridView.classList.remove('active');
                slidesView.classList.add('active');
                
                // Réinitialiser les spans pour la vue slides
                galleryItems.forEach(item => {
                    item.classList.remove('tall', 'wide');
                });
            });
            
            // Ouvrir le lightbox au clic sur un élément
            galleryItems.forEach((item, index) => {
                item.addEventListener('click', () => {
                    // Trouver l'index dans les éléments filtrés
                    const filteredIndex = filteredItems.indexOf(item);
                    openLightbox(filteredIndex);
                    initThumbnails();
                });
            });
            
            // Charger plus d'éléments
            loadMoreBtn.addEventListener('click', () => {
                // Ajouter une animation au bouton
                loadMoreBtn.classList.add('animate-pulse');
                
                // Simuler le chargement de nouveaux éléments
                setTimeout(() => {
                    loadMoreBtn.classList.remove('animate-pulse');
                    loadMoreBtn.textContent = "Toutes les photos sont chargées";
                    loadMoreBtn.disabled = true;
                    loadMoreBtn.classList.add('opacity-50', 'cursor-not-allowed');
                }, 1500);
            });
            
            // Appliquer les filtres par défaut
            applyFilters();
        }
    </script>
@include("entete.footer")

@endsection