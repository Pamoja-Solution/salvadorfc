@extends('entete.base')
@section("titre", "Calendrier")
@section("contenus")
<!--DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FC Salvador - Tableau de bord</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/build/three.min.js"></script-->
    <style>
       
        
        .perspective-card {
            transform-style: preserve-3d;
            perspective: 1000px;
        }
        
        .card-3d {
            transition: transform 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
            transform: rotateY(0deg);
            backface-visibility: hidden;
        }
        
        .perspective-card:hover .card-3d {
            transform: rotateY(10deg);
        }
        
        .competition-cell {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .competition-cell::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: all 0.6s ease;
        }
        
        .competition-cell:hover::before {
            left: 100%;
        }
        
        .carousel-container {
            scroll-behavior: smooth;
        }
        
        .carousel-item {
            min-width: 300px;
            transition: all 0.5s ease;
        }
        
        .carousel-item:hover {
            transform: translateY(-10px);
        }
        
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
            animation: fadeInUp 0.8s forwards;
        }
        
        .score-badge {
            position: relative;
            overflow: hidden;
        }
        
        .score-badge::after {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(138, 75, 255, 0.2) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .score-badge:hover::after {
            opacity: 1;
        }
        
        #canvas-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.2;
        }
        
        /* Styles pour les Stories */
        .story {
            cursor: pointer;
            position: relative;
            transition: transform 0.3s ease;
            border: 3px solid transparent;
            overflow: hidden;
            border-radius: 0.75rem;
        }
        
        .story.active {
            border-color: #8B5CF6;
        }
        
        .story:hover {
            transform: translateY(-5px);
        }
        
        .story-avatar {
            border: 3px solid #8B5CF6;
            box-shadow: 0 0 0 2px rgba(139, 92, 246, 0.3);
        }
        
        .story-ring {
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            border-radius: 0.75rem;
            border: 3px solid transparent;
            background: linear-gradient(45deg, #8B5CF6, #3B82F6) border-box;
            -webkit-mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: destination-out;
            mask-composite: exclude;
        }
        
        .story-unseen .story-ring {
            opacity: 1;
        }
        
        .story-seen .story-ring {
            opacity: 0.3;
        }
        
        .story-modal {
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
        
        .story-modal.active {
            opacity: 1;
            pointer-events: auto;
        }
        
        .story-content {
            position: relative;
            width: 100%;
            max-width: 400px;
            height: 85vh;
            max-height: 700px;
            overflow: hidden;
            border-radius: 0.75rem;
            transform: scale(0.9);
            transition: transform 0.3s ease;
        }
        
        .story-modal.active .story-content {
            transform: scale(1);
        }
        
        .story-close {
            position: absolute;
            top: 15px;
            right: 15px;
            z-index: 60;
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
        
        .story-close:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
        
        .story-progress {
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            height: 3px;
            z-index: 60;
            display: flex;
            gap: 5px;
        }
        
        .progress-bar {
            height: 100%;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
            flex-grow: 1;
            overflow: hidden;
        }
        
        .progress-bar-fill {
            height: 100%;
            width: 0%;
            background-color: white;
            border-radius: 3px;
            transition: width 0.1s linear;
        }
        
        .story-image, .story-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .story-caption {
            position: absolute;
            bottom: 20px;
            left: 15px;
            right: 15px;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            padding: 15px;
            border-radius: 10px;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }
        
        .story-modal.active .story-caption {
            opacity: 1;
            transform: translateY(0);
        }
        
        .stories-container {
            position: relative;
            overflow: visible;
        }
        
        .stories-pagination {
            position: absolute;
            bottom: -30px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            gap: 8px;
        }
        
        .pagination-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
        }
        
        .pagination-dot.active {
            width: 24px;
            border-radius: 4px;
            background-color: rgba(139, 92, 246, 0.7);
        }
        
        @media (max-width: 768px) {
            .story-content {
                max-width: 90%;
                height: 70vh;
            }
        }
    </style>

        <div class="container mx-auto px-4 py-8">
        <section class="mb-16 opacity-0 transform translate-y-1 transition-all duration-1000 ease-out" id="rankings-section">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl md:text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500">Classements</h2>
                <div class="hidden md:flex space-x-2">
                    <button class="px-4 py-2 bg-gray-700/50 text-white rounded-lg hover:bg-gray-600/50 transition-all">Cette saison</button>
                    <button class="px-4 py-2 bg-gray-700/50 text-white rounded-lg hover:bg-gray-600/50 transition-all">Historique</button>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Carte Championnat -->
                <div class="perspectives-card">
                    <div class="card-3d bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-2xl overflow-hidden border border-gray-700">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-xl font-bold text-white">Ligue 1</h3>
                                <span class="px-3 py-1 bg-purple-500/20 text-purple-400 text-sm font-medium rounded-full">2023-2024</span>
                            </div>
                            
                            <div class="space-y-4">
                                <div class="competition-cell bg-gray-800/50 rounded-lg p-4 flex items-center">
                                    <span class="text-lg font-semibold mr-3 text-purple-500">3</span>
                                    <div class="flex-grow">
                                        <div class="flex items-center">
                                            <span class="font-semibold">FC Salvador</span>
                                            <div class="ml-auto flex space-x-2 text-sm text-gray-400">
                                                <span>26 matchs</span>
                                                <span>56 pts</span>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-4 gap-2 mt-2 text-xs">
                                            <div class="flex flex-col items-center">
                                                <span class="text-gray-400">V</span>
                                                <span class="font-semibold text-green-500">17</span>
                                            </div>
                                            <div class="flex flex-col items-center">
                                                <span class="text-gray-400">N</span>
                                                <span class="font-semibold text-yellow-500">5</span>
                                            </div>
                                            <div class="flex flex-col items-center">
                                                <span class="text-gray-400">D</span>
                                                <span class="font-semibold text-red-500">4</span>
                                            </div>
                                            <div class="flex flex-col items-center">
                                                <span class="text-gray-400">±</span>
                                                <span class="font-semibold text-blue-500">+21</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-5 text-center text-xs text-gray-400 px-4">
                                    <div>Rang</div>
                                    <div class="col-span-2">Équipe</div>
                                    <div>Points</div>
                                    <div>±</div>
                                </div>
                                
                                <div class="space-y-2">
                                    <div class="competition-cell bg-gray-800/30 rounded-lg p-3 grid grid-cols-5 items-center text-sm">
                                        <div class="text-center font-medium">1</div>
                                        <div class="col-span-2 font-medium">Paris SG</div>
                                        <div class="text-center">64</div>
                                        <div class="text-center text-green-500">+39</div>
                                    </div>
                                    <div class="competition-cell bg-gray-800/30 rounded-lg p-3 grid grid-cols-5 items-center text-sm">
                                        <div class="text-center font-medium">2</div>
                                        <div class="col-span-2 font-medium">Marseille</div>
                                        <div class="text-center">58</div>
                                        <div class="text-center text-green-500">+27</div>
                                    </div>
                                    <div class="competition-cell bg-purple-900/30 rounded-lg p-3 grid grid-cols-5 items-center text-sm">
                                        <div class="text-center font-medium text-purple-500">3</div>
                                        <div class="col-span-2 font-medium">FC Salvador</div>
                                        <div class="text-center">56</div>
                                        <div class="text-center text-green-500">+21</div>
                                    </div>
                                    <div class="competition-cell bg-gray-800/30 rounded-lg p-3 grid grid-cols-5 items-center text-sm">
                                        <div class="text-center font-medium">4</div>
                                        <div class="col-span-2 font-medium">Monaco</div>
                                        <div class="text-center">52</div>
                                        <div class="text-center text-green-500">+18</div>
                                    </div>
                                    <div class="competition-cell bg-gray-800/30 rounded-lg p-3 grid grid-cols-5 items-center text-sm">
                                        <div class="text-center font-medium">5</div>
                                        <div class="col-span-2 font-medium">Lyon</div>
                                        <div class="text-center">48</div>
                                        <div class="text-center text-green-500">+15</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Carte Coupes -->
                <div class="perspectives-card">
                    <div class="card-3d bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-2xl overflow-hidden border border-gray-700">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-6">
                                <h3 class="text-xl font-bold text-white">Autres compétitions</h3>
                                <span class="px-3 py-1 bg-blue-500/20 text-blue-400 text-sm font-medium rounded-full">En cours</span>
                            </div>
                            
                            <div class="space-y-5">
                                <div class="competition-cell bg-gray-800/50 rounded-lg p-4">
                                    <div class="flex justify-between items-center mb-3">
                                        <h4 class="font-semibold">Champions League</h4>
                                        <span class="px-2 py-1 bg-yellow-600/20 text-yellow-500 text-xs font-medium rounded-full">Quart de finale</span>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="bg-gray-700/30 rounded-lg p-3">
                                            <div class="text-xs text-gray-400 mb-1">Match aller</div>
                                            <div class="flex justify-between items-center">
                                                <span>FC Salvador</span>
                                                <span class="score-badge px-2 py-1 bg-gray-700 rounded-md font-semibold">2 - 1</span>
                                                <span>Bayern</span>
                                            </div>
                                        </div>
                                        <div class="bg-gray-700/30 rounded-lg p-3">
                                            <div class="text-xs text-gray-400 mb-1">Match retour</div>
                                            <div class="flex justify-between items-center">
                                                <span>Bayern</span>
                                                <span class="score-badge px-2 py-1 bg-gray-700 rounded-md font-semibold">? - ?</span>
                                                <span>FC Salvador</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="competition-cell bg-gray-800/50 rounded-lg p-4">
                                    <div class="flex justify-between items-center mb-3">
                                        <h4 class="font-semibold">Coupe Nationale</h4>
                                        <span class="px-2 py-1 bg-green-600/20 text-green-500 text-xs font-medium rounded-full">Demi-finale</span>
                                    </div>
                                    <div class="bg-gray-700/30 rounded-lg p-3">
                                        <div class="text-xs text-gray-400 mb-1">Prochain match</div>
                                        <div class="flex justify-between items-center">
                                            <span>FC Salvador</span>
                                            <span class="score-badge px-2 py-1 bg-gray-700 rounded-md font-semibold">vs</span>
                                            <span>Montpellier</span>
                                        </div>
                                        <div class="text-xs text-gray-400 mt-2 text-center">
                                            15 mars 2024 - 21:00
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="competition-cell bg-gray-800/50 rounded-lg p-4">
                                    <div class="flex justify-between items-center">
                                        <h4 class="font-semibold">Supercoupe</h4>
                                        <span class="px-2 py-1 bg-blue-600/20 text-blue-500 text-xs font-medium rounded-full">Vainqueur</span>
                                    </div>
                                    <div class="mt-2 text-sm text-gray-400">
                                        <div class="flex justify-between">
                                            <span>FC Salvador</span>
                                            <span class="font-medium text-white">3 - 1</span>
                                            <span>Nantes</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Section Calendrier -->
        <section class="mb-16 opacity-0 transform translate-y-10 transition-all duration-1000 ease-out delay-200" id="schedule-section">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl md:text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500">Calendrier des matchs</h2>
                <div class="hidden md:flex space-x-2">
                    <button id="prev-btn" class="px-3 py-2 bg-gray-700/50 text-white rounded-lg hover:bg-gray-600/50 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button id="next-btn" class="px-3 py-2 bg-gray-700/50 text-white rounded-lg hover:bg-gray-600/50 transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
            
            <div class="relative overflow-hidden">
                <div class="carousel-container flex space-x-4 overflow-x-auto pb-4 scrollbar-hide">
                    <!-- Match 1 -->
                    <div class="carousel-item bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl overflow-hidden border border-gray-700 flex-shrink-0">
                        <div class="p-5">
                            <div class="flex justify-between items-center mb-4">
                                <span class="px-3 py-1 bg-blue-500/20 text-blue-400 text-sm font-medium rounded-full">Ligue 1</span>
                                <span class="text-sm text-gray-400">J27</span>
                            </div>
                            
                            <div class="flex flex-col items-center mb-4">
                                <span class="text-lg font-semibold mb-2">10 mars 2024</span>
                                <span class="px-3 py-1 bg-gray-700/50 text-white text-sm rounded-full">20:45</span>
                            </div>
                            
                            <div class="flex justify-between items-center mb-6">
                                <div class="flex flex-col items-center w-1/3">
                                    <div class="w-16 h-16 bg-gray-700 rounded-full flex items-center justify-center mb-2">
                                        <span class="text-2xl font-bold">FC</span>
                                    </div>
                                    <span class="text-center">FC Salvador</span>
                                </div>
                                
                                <div class="text-center">
                                    <span class="text-2xl font-bold">vs</span>
                                </div>
                                
                                <div class="flex flex-col items-center w-1/3">
                                    <div class="w-16 h-16 bg-gray-700 rounded-full flex items-center justify-center mb-2">
                                        <span class="text-2xl font-bold">N</span>
                                    </div>
                                    <span class="text-center">Nice</span>
                                </div>
                            </div>
                            
                            <div class="bg-gray-700/30 rounded-lg p-3">
                                <div class="flex justify-between items-center text-sm">
                                    <span>Stade Maurice</span>
                                    <span class="px-2 py-1 bg-purple-500/20 text-purple-400 text-xs font-medium rounded-full">Domicile</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Match 2 -->
                    <div class="carousel-item bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl overflow-hidden border border-gray-700 flex-shrink-0">
                        <div class="p-5">
                            <div class="flex justify-between items-center mb-4">
                                <span class="px-3 py-1 bg-yellow-500/20 text-yellow-400 text-sm font-medium rounded-full">Champions League</span>
                                <span class="text-sm text-gray-400">Quart</span>
                            </div>
                            
                            <div class="flex flex-col items-center mb-4">
                                <span class="text-lg font-semibold mb-2">14 mars 2024</span>
                                <span class="px-3 py-1 bg-gray-700/50 text-white text-sm rounded-full">21:00</span>
                            </div>
                            
                            <div class="flex justify-between items-center mb-6">
                                <div class="flex flex-col items-center w-1/3">
                                    <div class="w-16 h-16 bg-gray-700 rounded-full flex items-center justify-center mb-2">
                                        <span class="text-2xl font-bold">BA</span>
                                    </div>
                                    <span class="text-center">Bayern</span>
                                </div>
                                
                                <div class="text-center">
                                    <span class="text-2xl font-bold">vs</span>
                                </div>
                                
                                <div class="flex flex-col items-center w-1/3">
                                    <div class="w-16 h-16 bg-gray-700 rounded-full flex items-center justify-center mb-2">
                                        <span class="text-2xl font-bold">FC</span>
                                    </div>
                                    <span class="text-center">FC Salvador</span>
                                </div>
                            </div>
                            
                            <div class="bg-gray-700/30 rounded-lg p-3">
                                <div class="flex justify-between items-center text-sm">
                                    <span>Allianz Arena</span>
                                    <span class="px-2 py-1 bg-blue-500/20 text-blue-400 text-xs font-medium rounded-full">Extérieur</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Match 3 -->
                    <div class="carousel-item bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl overflow-hidden border border-gray-700 flex-shrink-0">
                        <div class="p-5">
                            <div class="flex justify-between items-center mb-4">
                                <span class="px-3 py-1 bg-green-500/20 text-green-400 text-sm font-medium rounded-full">Coupe Nationale</span>
                                <span class="text-sm text-gray-400">Demi</span>
                            </div>
                            
                            <div class="flex flex-col items-center mb-4">
                                <span class="text-lg font-semibold mb-2">18 mars 2024</span>
                                <span class="px-3 py-1 bg-gray-700/50 text-white text-sm rounded-full">21:00</span>
                            </div>
                            
                            <div class="flex justify-between items-center mb-6">
                                <div class="flex flex-col items-center w-1/3">
                                    <div class="w-16 h-16 bg-gray-700 rounded-full flex items-center justify-center mb-2">
                                        <span class="text-2xl font-bold">FC</span>
                                    </div>
                                    <span class="text-center">FC Salvador</span>
                                </div>
                                
                                <div class="text-center">
                                    <span class="text-2xl font-bold">vs</span>
                                </div>
                                
                                <div class="flex flex-col items-center w-1/3">
                                    <div class="w-16 h-16 bg-gray-700 rounded-full flex items-center justify-center mb-2">
                                        <span class="text-2xl font-bold">M</span>
                                    </div>
                                    <span class="text-center">Montpellier</span>
                                </div>
                            </div>
                            
                            <div class="bg-gray-700/30 rounded-lg p-3">
                                <div class="flex justify-between items-center text-sm">
                                    <span>Stade Maurice</span>
                                    <span class="px-2 py-1 bg-purple-500/20 text-purple-400 text-xs font-medium rounded-full">Domicile</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Match 4 -->
                    <div class="carousel-item bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl overflow-hidden border border-gray-700 flex-shrink-0">
                        <div class="p-5">
                            <div class="flex justify-between items-center mb-4">
                                <span class="px-3 py-1 bg-blue-500/20 text-blue-400 text-sm font-medium rounded-full">Ligue 1</span>
                                <span class="text-sm text-gray-400">J28</span>
                            </div>
                            
                            <div class="flex flex-col items-center mb-4">
                                <span class="text-lg font-semibold mb-2">24 mars 2024</span>
                                <span class="px-3 py-1 bg-gray-700/50 text-white text-sm rounded-full">17:00</span>
                            </div>
                            
                            <div class="flex justify-between items-center mb-6">
                                <div class="flex flex-col items-center w-1/3">
                                    <div class="w-16 h-16 bg-gray-700 rounded-full flex items-center justify-center mb-2">
                                        <span class="text-2xl font-bold">L</span>
                                    </div>
                                    <span class="text-center">Lens</span>
                                </div>
                                
                                <div class="text-center">
                                    <span class="text-2xl font-bold">vs</span>
                                </div>
                                
                                <div class="flex flex-col items-center w-1/3">
                                    <div class="w-16 h-16 bg-gray-700 rounded-full flex items-center justify-center mb-2">
                                        <span class="text-2xl font-bold">FC</span>
                                    </div>
                                    <span class="text-center">FC Salvador</span>
                                </div>
                            </div>
                            
                            <div class="bg-gray-700/30 rounded-lg p-3">
                                <div class="flex justify-between items-center text-sm">
                                    <span>Stade Bollaert</span>
                                    <span class="px-2 py-1 bg-blue-500/20 text-blue-400 text-xs font-medium rounded-full">Extérieur</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Match 5 -->
                    <div class="carousel-item bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl overflow-hidden border border-gray-700 flex-shrink-0">
                        <div class="p-5">
                            <div class="flex justify-between items-center mb-4">
                                <span class="px-3 py-1 bg-blue-500/20 text-blue-400 text-sm font-medium rounded-full">Ligue 1</span>
                                <span class="text-sm text-gray-400">J29</span>
                            </div>
                            
                            <div class="flex flex-col items-center mb-4">
                                <span class="text-lg font-semibold mb-2">31 mars 2024</span>
                                <span class="px-3 py-1 bg-gray-700/50 text-white text-sm rounded-full">20:45</span>
                            </div>
                            
                            <div class="flex justify-between items-center mb-6">
                                <div class="flex flex-col items-center w-1/3">
                                    <div class="w-16 h-16 bg-gray-700 rounded-full flex items-center justify-center mb-2">
                                        <span class="text-2xl font-bold">FC</span>
                                    </div>
                                    <span class="text-center">FC Salvador</span>
                                </div>
                                
                                <div class="text-center">
                                    <span class="text-2xl font-bold">vs</span>
                                </div>
                                
                                <div class="flex flex-col items-center w-1/3">
                                    <div class="w-16 h-16 bg-gray-700 rounded-full flex items-center justify-center mb-2">
                                        <span class="text-2xl font-bold">M</span>
                                    </div>
                                    <span class="text-center">Monaco</span>
                                </div>
                            </div>
                            
                            <div class="bg-gray-700/30 rounded-lg p-3">
                                <div class="flex justify-between items-center text-sm">
                                    <span>Stade Maurice</span>
                                    <span class="px-2 py-1 bg-purple-500/20 text-purple-400 text-xs font-medium rounded-full">Domicile</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Section Newsletter -->
        <section class="mt-20 bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-2xl overflow-hidden opacity-0 transform translate-y-10 transition-all duration-1000 ease-out delay-400" id="newsletter-container">
            <div class="grid grid-cols-1 lg:grid-cols-5">
                <div class="lg:col-span-3 p-8 lg:p-12">
                    <h3 class="text-2xl md:text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-blue-500 mb-4">Restez informé !</h3>
                    <p class="text-gray-300 mb-6">Inscrivez-vous à notre newsletter pour ne rien manquer des dernières actualités, résultats et événements du FC Salvador.</p>
                    
                    <form class="space-y-4">
                        <div class="flex flex-col sm:flex-row gap-4">
                            <input type="text" placeholder="Votre nom" class="bg-gray-700/50 text-white border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                            <input type="email" placeholder="Votre email" class="bg-gray-700/50 text-white border border-gray-600 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 w-full">
                        </div>
                        <div class="flex items-center">
                            <input type="checkbox" id="newsletter-consent" class="rounded text-purple-500 focus:ring-purple-500">
                            <label for="newsletter-consent" class="ml-2 text-gray-300 text-sm">J'accepte de recevoir les actualités du FC Salvador par email</label>
                        </div>
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-purple-500 to-blue-500 text-white font-semibold rounded-lg shadow-lg transform transition-all duration-300 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 w-full sm:w-auto">
                            S'abonner
                        </button>
                    </form>
                </div>
                <div class="lg:col-span-2 hidden lg:block relative">
                    <div class="absolute inset-0 bg-purple-900/20"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-gray-900 to-transparent"></div>
                </div>
            </div>
        </section>
    </div>

    <script>
        // Animations d'entrée
        document.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                document.getElementById('stories-section').classList.remove('opacity-0', 'translate-y-10');
            }, 200);
            
            setTimeout(() => {
                document.getElementById('rankings-section').classList.remove('opacity-0', 'translate-y-10');
            }, 400);
            
            setTimeout(() => {
                document.getElementById('schedule-section').classList.remove('opacity-0', 'translate-y-10');
            }, 600);
            
            setTimeout(() => {
                document.getElementById('newsletter-container').classList.remove('opacity-0', 'translate-y-10');
            }, 800);
            
            // Initialisation du système de Stories
            initStories();
        });
        
        // Gestion du carrousel des matchs
        const carousel = document.querySelector('.carousel-container');
        const carouselItems = document.querySelectorAll('.carousel-item');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        
        let currentIndex = 0;
        const itemWidth = 320; // largeur + marge
        
        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
            }
        });
        
        nextBtn.addEventListener('click', () => {
            if (currentIndex < carouselItems.length - 1) {
                currentIndex++;
                updateCarousel();
            }
        });
        
        function updateCarousel() {
            carousel.scrollTo({
                left: currentIndex * itemWidth,
                behavior: 'smooth'
            });
        }
        
        // Animation 3D avec Three.js
        function init3DBackground() {
            const container = document.getElementById('canvas-container');
            
            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
            camera.position.z = 5;
            
            const renderer = new THREE.WebGLRenderer({ alpha: true });
            renderer.setSize(window.innerWidth, window.innerHeight);
            container.appendChild(renderer.domElement);
            
            // Créer des sphères avec des couleurs dégradées
            const spheres = [];
            const colors = [
                new THREE.Color(0x8a4bff), // violet
                new THREE.Color(0x4b96ff), // bleu
                new THREE.Color(0xff4bdb)  // rose
            ];
            
            for (let i = 0; i < 10; i++) {
                const geometry = new THREE.SphereGeometry(Math.random() * 0.5 + 0.2, 32, 32);
                const material = new THREE.MeshBasicMaterial({
                    color: colors[i % colors.length],
                    transparent: true,
                    opacity: 0.1
                });
                
                const sphere = new THREE.Mesh(geometry, material);
                sphere.position.x = (Math.random() - 0.5) * 10;
                sphere.position.y = (Math.random() - 0.5) * 10;
                sphere.position.z = (Math.random() - 0.5) * 10;
                
                // Vitesses de rotation aléatoires
                sphere.rotationSpeed = {
                    x: (Math.random() - 0.5) * 0.01,
                    y: (Math.random() - 0.5) * 0.01,
                    z: (Math.random() - 0.5) * 0.01
                };
                
                // Vitesses de déplacement aléatoires
                sphere.movementSpeed = {
                    x: (Math.random() - 0.5) * 0.005,
                    y: (Math.random() - 0.5) * 0.005,
                    z: (Math.random() - 0.5) * 0.005
                };
                
                scene.add(sphere);
                spheres.push(sphere);
            }
            
            // Animation
            function animate() {
                requestAnimationFrame(animate);
                
                spheres.forEach(sphere => {
                    // Rotation
                    sphere.rotation.x += sphere.rotationSpeed.x;
                    sphere.rotation.y += sphere.rotationSpeed.y;
                    sphere.rotation.z += sphere.rotationSpeed.z;
                    
                    // Mouvement
                    sphere.position.x += sphere.movementSpeed.x;
                    sphere.position.y += sphere.movementSpeed.y;
                    sphere.position.z += sphere.movementSpeed.z;
                    
                    // Limites et rebond
                    ['x', 'y', 'z'].forEach(axis => {
                        if (Math.abs(sphere.position[axis]) > 10) {
                            sphere.movementSpeed[axis] *= -1;
                        }
                    });
                });
                
                renderer.render(scene, camera);
            }
            
            animate();
            
            // Redimensionnement
            window.addEventListener('resize', () => {
                camera.aspect = window.innerWidth / window.innerHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(window.innerWidth, window.innerHeight);
            });
        }
        
        init3DBackground();
        
        // Système de Stories
        function initStories() {
            const storiesCarousel = document.getElementById('stories-carousel');
            const storyModal = document.getElementById('story-modal');
            const storyClose = document.getElementById('story-close');
            const storyPlayer = document.getElementById('story-player');
            const storyCaption = document.getElementById('story-caption');
            const storyProgress = document.querySelector('.story-progress');
            const prevStoryBtn = document.getElementById('prev-story');
            const nextStoryBtn = document.getElementById('next-story');
            const prevSlide = document.getElementById('prev-slide');
            const nextSlide = document.getElementById('next-slide');
            const storiesPagination = document.querySelector('.stories-pagination');
            
            const stories = document.querySelectorAll('.story');
            let storyIndex = 0;
            let storyPosition = 0;
            let storyInterval;
            let currentStoryDuration = 30000; // 30 secondes par défaut
            
            // Créer la pagination
            stories.forEach((_, index) => {
                const dot = document.createElement('div');
                dot.classList.add('pagination-dot');
                if (index === 0) dot.classList.add('active');
                dot.addEventListener('click', () => {
                    moveStoryCarousel(index);
                });
                storiesPagination.appendChild(dot);
            });
            
            // Navigation du carousel des stories
            function moveStoryCarousel(index) {
                storyPosition = index;
                updateStoryPagination();
                
                const storyWidth = stories[0].offsetWidth + 16; // 16px pour l'espace
                const offset = storyWidth * index;
                
                storiesCarousel.style.transform = `translateX(-${offset}px)`;
            }
            
            // Mettre à jour la pagination
            function updateStoryPagination() {
                const dots = document.querySelectorAll('.pagination-dot');
                dots.forEach((dot, index) => {
                    if (index === storyPosition) {
                        dot.classList.add('active');
                    } else {
                        dot.classList.remove('active');
                    }
                });
            }
            
            // Boutons de navigation
            prevStoryBtn.addEventListener('click', () => {
                if (storyPosition > 0) {
                    moveStoryCarousel(storyPosition - 1);
                }
            });
            
            nextStoryBtn.addEventListener('click', () => {
                if (storyPosition < stories.length - 1) {
                    moveStoryCarousel(storyPosition + 1);
                }
            });
            
            // Ouvrir une story au clic
            stories.forEach((story, index) => {
                story.addEventListener('click', () => {
                    storyIndex = index;
                    openStory(storyIndex);
                });
            });
            
            // Fermer la story
            storyClose.addEventListener('click', closeStory);
            
            // Navigation dans la story ouverte
            prevSlide.addEventListener('click', () => {
                if (storyIndex > 0) {
                    storyIndex--;
                    openStory(storyIndex);
                } else {
                    closeStory();
                }
            });
            
            nextSlide.addEventListener('click', () => {
                if (storyIndex < stories.length - 1) {
                    storyIndex++;
                    openStory(storyIndex);
                } else {
                    closeStory();
                }
            });
            
            // Ouvrir une story
            function openStory(index) {
                clearInterval(storyInterval);
                
                const story = stories[index];
                const storyId = story.getAttribute('data-story-id');
                const storyType = story.getAttribute('data-story-type');
                const storySrc = story.getAttribute('data-story-src');
                const storyText = story.getAttribute('data-story-caption');
                
                storyPlayer.innerHTML = '';
                storyProgress.innerHTML = '';
                
                // Marquer la story comme vue
                story.classList.remove('story-unseen');
                story.classList.add('story-seen');
                
                // Créer les barres de progression
                stories.forEach((_, i) => {
                    const progressBar = document.createElement('div');
                    progressBar.className = 'progress-bar';
                    
                    const fill = document.createElement('div');
                    fill.className = 'progress-bar-fill';
                    
                    if (i < index) {
                        fill.style.width = '100%';
                    } else if (i > index) {
                        fill.style.width = '0%';
                    }
                    
                    progressBar.appendChild(fill);
                    storyProgress.appendChild(progressBar);
                });
                
                // Ajouter le contenu selon le type
                if (storyType === 'image') {
                    const img = document.createElement('img');
                    img.className = 'story-image';
                    img.src = storySrc;
                    img.alt = `Story ${storyId}`;
                    storyPlayer.appendChild(img);
                } else if (storyType === 'video') {
                    const video = document.createElement('video');
                    video.className = 'story-video';
                    video.autoplay = true;
                    video.muted = false;
                    video.loop = true;
                    video.src = storySrc;
                    storyPlayer.appendChild(video);
                    
                    // Durée spécifique pour les vidéos
                    video.addEventListener('loadedmetadata', () => {
                        currentStoryDuration = Math.min(video.duration * 1000, 30000);
                        startStoryProgress();
                    });
                }
                
                // Ajouter le texte
                storyCaption.textContent = storyText;
                
                // Afficher la modal
                storyModal.classList.add('active');
                
                // Lancer la progression
                if (storyType === 'image') {
                    currentStoryDuration = 30000; // 30 secondes pour les images
                    startStoryProgress();
                }
                
                // Empêcher le défilement du body
                document.body.style.overflow = 'hidden';
            }
            
            // Démarrer la progression
            function startStoryProgress() {
                const currentProgressBar = storyProgress.children[storyIndex].querySelector('.progress-bar-fill');
                const startTime = Date.now();
                const endTime = startTime + currentStoryDuration;
                
                currentProgressBar.style.width = '0%';
                
                storyInterval = setInterval(() => {
                    const now = Date.now();
                    const timeElapsed = now - startTime;
                    const progress = (timeElapsed / currentStoryDuration) * 100;
                    
                    currentProgressBar.style.width = `${Math.min(progress, 100)}%`;
                    
                    if (now >= endTime) {
                        clearInterval(storyInterval);
                        
                        // Passer à la story suivante ou fermer
                        if (storyIndex < stories.length - 1) {
                            storyIndex++;
                            setTimeout(() => {
                                openStory(storyIndex);
                            }, 300);
                        } else {
                            closeStory();
                        }
                    }
                }, 100);
            }
            
            // Fermer la story
            function closeStory() {
                clearInterval(storyInterval);
                storyModal.classList.remove('active');
                document.body.style.overflow = '';
                
                // Arrêter les vidéos
                const video = storyPlayer.querySelector('video');
                if (video) {
                    video.pause();
                }
            }
            
            // Fermer au clic en dehors du contenu
            storyModal.addEventListener('click', (e) => {
                if (e.target === storyModal) {
                    closeStory();
                }
            });
            
            // Fermer avec la touche Echap
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    closeStory();
                }
            });
            
            // Adaptation responsive des vignettes
            function adjustStoriesSizes() {
                const screenWidth = window.innerWidth;
                stories.forEach(story => {
                    if (screenWidth < 640) {
                        story.style.minWidth = '200px';
                    } else if (screenWidth < 1024) {
                        story.style.minWidth = '230px';
                    } else {
                        story.style.minWidth = '280px';
                    }
                });
            }
            
            // Initialiser les tailles et les mettre à jour au redimensionnement
            adjustStoriesSizes();
            window.addEventListener('resize', adjustStoriesSizes);
        }
    </script>
