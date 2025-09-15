@extends('layouts.app')
@section('title', 'FlyFret - Devis Colis Multiples')
@section('ChildContent')

<style>
    :root {
        --primary: #8022F4;
        --primary-light: #F20CF3;
        --primary-dark: #8022F4;
        --secondary: #e11d48;
        --dark: #1e293b;
        --light: #f8fafc;
        --white: #ffffff;
        --gray-100: #f1f5f9;
        --gray-200: #e2e8f0;
        --gray-300: #cbd5e1;
        --gray-500: #64748b;
        --gray-700: #334155;
        --success: #10b981;
        --warning: #f59e0b;
        --error: #ef4444;
        --radius-sm: 4px;
        --radius-md: 8px;
        --radius-lg: 12px;
        --shadow-sm: 0 1px 2px 0 rgba(0,0,0,0.05);
        --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05);
        --transition: all 0.15s ease-in-out;
    }

   

    /* Main Container */
    .devis-container {
        max-width: 800px;
        margin: 2rem auto;
        background: var(--white);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        overflow: hidden;
    }

    .devis-header {
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        padding: 1.5rem 2rem;
        color: var(--white);
    }

    .devis-header-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .devis-title {
        font-size: 1.25rem;
        font-weight: 600;
    }

    .devis-subtitle {
        font-size: 0.875rem;
        opacity: 0.9;
        margin-top: 0.25rem;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        color: var(--white);
        background: rgba(255,255,255,0.1);
        padding: 0.5rem 1rem;
        border-radius: var(--radius-sm);
        font-size: 0.875rem;
        transition: var(--transition);
    }

    .back-btn:hover {
        background: rgba(255,255,255,0.2);
    }

    .devis-icon {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
    }

    /* Form Sections */
    .form-section {
        padding: 2rem;
        border-bottom: 1px solid var(--gray-200);
    }

    .section-title {
        font-size: 1rem;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .section-title svg {
        width: 20px;
        height: 20px;
        color: var(--primary);
    }

    /* Transport Options */
    .transport-options {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }

    .transport-option {
        border: 1px solid var(--gray-200);
        border-radius: var(--radius-md);
        padding: 1.5rem;
        cursor: pointer;
        transition: var(--transition);
        position: relative;
        overflow: hidden;
    }

    .transport-option:hover {
        border-color: var(--primary-light);
        box-shadow: var(--shadow-sm);
    }

    .transport-option.selected {
        border-color: var(--primary);
        background-color: rgba(37, 99, 235, 0.03);
    }

    .transport-option.selected::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: var(--primary);
    }

    .transport-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(37, 99, 235, 0.1);
        border-radius: 50%;
        margin-bottom: 1rem;
        color: var(--primary);
    }

    .transport-name {
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .transport-desc {
        font-size: 0.875rem;
        color: var(--gray-500);
    }

    .checkmark {
        position: absolute;
        top: 1rem;
        right: 1rem;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: var(--primary);
        color: var(--white);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
        opacity: 0;
        transform: scale(0);
        transition: var(--transition);
    }

    .transport-option.selected .checkmark {
        opacity: 1;
        transform: scale(1);
    }

    /* Form Fields */
    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 500;
        color: var(--gray-700);
        margin-bottom: 0.5rem;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--gray-300);
        border-radius: var(--radius-md);
        font-size: 0.9375rem;
        transition: var(--transition);
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%2364748b' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 1rem center;
        background-size: 16px;
    }

    /* Package Selector */
    .package-selector {
        position: relative;
        margin-bottom: 2rem;
    }

    .select-box {
        border: 1px solid var(--gray-300);
        border-radius: var(--radius-md);
        padding: 0.875rem 1rem;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: var(--white);
    }

    .select-box.open {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .dropdown-options {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        max-height: 300px;
        overflow-y: auto;
        background: var(--white);
        border: 1px solid var(--gray-200);
        border-radius: var(--radius-md);
        box-shadow: var(--shadow-lg);
        z-index: 10;
        margin-top: 0.5rem;
        display: none;
    }

    .dropdown-options.open {
        display: block;
        animation: fadeIn 0.15s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .option-item {
        padding: 0.875rem 1rem;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        border-bottom: 1px solid var(--gray-100);
    }

    .option-item:last-child {
        border-bottom: none;
    }

    .option-item:hover {
        background: var(--gray-100);
    }

    .option-item.selected {
        background: var(--gray-100);
        font-weight: 500;
    }

    /* Package Items */
    .package-list {
        margin-top: 1.5rem;
    }

    .package-item {
        background: var(--white);
        border: 1px solid var(--gray-200);
        border-radius: var(--radius-md);
        margin-bottom: 1rem;
        overflow: hidden;
    }

    .package-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 1rem 1.5rem;
        background: var(--gray-100);
        border-bottom: 1px solid var(--gray-200);
    }

    .package-title {
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .package-title svg {
        color: var(--primary);
        width: 18px;
        height: 18px;
    }

    .remove-package {
        background: none;
        border: none;
        color: var(--error);
        font-size: 0.8125rem;
        font-weight: 500;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.25rem 0.5rem;
        border-radius: var(--radius-sm);
        transition: var(--transition);
    }

    .remove-package:hover {
        background: rgba(239, 68, 68, 0.1);
    }

    .package-fields {
        padding: 1.5rem;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }

    .total-price {
        display: flex;
        align-items: center;
        font-size: 0.9375rem;
    }

    .total-price span {
        font-weight: 600;
        color: var(--primary);
        margin-left: 0.5rem;
    }

    /* Submit Button */
    .submit-btn {
        width: 100%;
        padding: 1rem;
        background: var(--primary);
        color: var(--white);
        border: none;
        border-radius: var(--radius-md);
        font-weight: 500;
        font-size: 1rem;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
    }

    .submit-btn:hover {
        background: var(--primary-dark);
    }

    .submit-btn:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }

    .loading-spinner {
        width: 20px;
        height: 20px;
        border: 2px solid rgba(255,255,255,0.3);
        border-radius: 50%;
        border-top-color: var(--white);
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
        
        .transport-options {
            grid-template-columns: 1fr;
        }
        
        .package-fields {
            grid-template-columns: 1fr;
        }
    }

    /* Floating Action Buttons */
    .fab-container {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        z-index: 100;
    }

    .fab {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: var(--shadow-md);
        transition: var(--transition);
        color: var(--white);
    }

    .fab:hover {
        transform: translateY(-3px);
        box-shadow: var(--shadow-lg);
    }

    .fab-whatsapp {
        background: #25D366;
    }

    .fab-messenger {
        background: #006AFF;
    }

    /* Tags container for selected packages */
    .tags-container {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        width: 100%;
    }

    .tag {
        background: var(--primary);
        color: var(--white);
        padding: 0.5rem 0.75rem;
        border-radius: var(--radius-sm);
        display: inline-flex;
        align-items: center;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .tag-remove {
        margin-left: 0.5rem;
        cursor: pointer;
        font-weight: bold;
        font-size: 0.9rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        transition: var(--transition);
    }

    .tag-remove:hover {
        background: rgba(255, 255, 255, 0.2);
    }

    .placeholder {
        color: var(--gray-500);
    }

    /* Popup styles */
    .flyfret-popup {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1000;
        background-color: var(--white);
        border: 1px solid var(--gray-200);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow-lg);
        padding: 2rem;
        width: 90%;
        max-width: 400px;
        text-align: center;
        display: none;
    }

    .flyfret-popup h2 {
        font-size: 1.25rem;
        font-weight: 600;
        color: var(--primary);
        margin-bottom: 1rem;
    }

    .flyfret-popup p {
        font-size: 0.875rem;
        color: var(--gray-500);
        margin-bottom: 1.5rem;
        line-height: 1.5;
    }

    .flyfret-popup button {
        background-color: var(--primary);
        color: var(--white);
        padding: 0.625rem 1.25rem;
        border: none;
        border-radius: var(--radius-md);
        font-size: 0.875rem;
        font-weight: 500;
        cursor: pointer;
        transition: var(--transition);
        width: 100%;
    }

    .flyfret-popup button:hover {
        background-color: var(--primary-dark);
    }

    .flyfret-popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
        display: none;
    }

    /* Hidden class */
    .hidden {
        display: none !important;
    }

    /* Storage option */
    .storage-option {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 1rem;
        padding: 0.75rem;
        border: 1px solid var(--gray-200);
        border-radius: var(--radius-md);
        cursor: pointer;
        transition: var(--transition);
    }

    .storage-option:hover {
        border-color: var(--primary-light);
    }

    .storage-option.selected {
        border-color: var(--primary);
        background-color: rgba(37, 99, 235, 0.03);
    }

    .storage-checkbox {
        width: 18px;
        height: 18px;
        border: 2px solid var(--gray-300);
        border-radius: var(--radius-sm);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: var(--transition);
    }

    .storage-option.selected .storage-checkbox {
        background-color: var(--primary);
        border-color: var(--primary);
    }

    .storage-option.selected .storage-checkbox svg {
        display: block;
    }

    .storage-checkbox svg {
        display: none;
        width: 12px;
        height: 12px;
        color: white;
    }

    .storage-label {
        font-size: 0.875rem;
        color: var(--gray-700);
    }

    .storage-price {
        margin-left: auto;
        font-weight: 500;
        color: var(--primary);
        font-size: 0.875rem;
    }

    /* Conservation checkbox */
    .conservation-checkbox {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 1.5rem;
    }

    .conservation-checkbox input {
        width: 18px;
        height: 18px;
        border: 2px solid var(--gray-300);
        border-radius: var(--radius-sm);
        appearance: none;
        cursor: pointer;
        transition: var(--transition);
    }

    .conservation-checkbox input:checked {
        background-color: var(--primary);
        border-color: var(--primary);
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='white' viewBox='0 0 16 16'%3E%3Cpath d='M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: center;
    }

    .conservation-checkbox label {
        font-size: 0.875rem;
        color: var(--gray-700);
        cursor: pointer;
    }

    .conservation-price {
        font-size: 0.75rem;
        color: var(--gray-500);
        margin-left: auto;
    }
</style>

<main>
    <div class="devis-container">
        <div class="devis-header">
            <div class="devis-header-content">
                <a href="#" onclick="history.back()" class="back-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 1 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                    </svg>
                    Retour
                </a>
                
                <div class="text-center">
                    <h2 class="devis-title">Devis Colis Multiples</h2>
                    <p class="devis-subtitle">Obtenez un devis personnalisé en temps réel</p>
                </div>
                
                <div class="devis-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                    </svg>
                </div>
            </div>
        </div>

        <form id="colisForm">
            @csrf
            <div class="form-section">
                <h3 class="section-title">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                    </svg>
                    Mode de Transport
                </h3>
                
                <div class="transport-options">
                    <label class="transport-option selected">
                        <input type="radio" name="mode_transport" value="aerien" checked hidden>
                        <div class="transport-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849Z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="transport-name">Aérien</div>
                            <div class="transport-desc">Rapide et sécurisé</div>
                        </div>
                        <div class="checkmark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                            </svg>
                        </div>
                    </label>
                    
                    <label class="transport-option">
                        <input type="radio" name="mode_transport" value="maritime" hidden>
                        <div class="transport-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="transport-name">Maritime</div>
                            <div class="transport-desc">Économique</div>
                        </div>
                        <div class="checkmark">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                            </svg>
                        </div>
                    </label>
                </div>
            </div>

            <div class="form-section">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="ville_depart" class="section-title">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Ville de Départ
                        </label>
                        <select name="ville_depart" id="ville_depart" class="form-control" required>
                            <option value="">Sélectionnez...</option>
                            <option value="Paris">Paris</option>
                            <option value="Lyon">Lyon</option>
                            <option value="Nancy">Nancy</option>
                            <option value="Abidjan">Abidjan</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="ville_destination" class="section-title">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Ville de Destination
                        </label>
                        <select name="ville_destination" id="ville_destination" class="form-control" required>
                            <option value="">Sélectionnez...</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h3 class="section-title">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                    Détails des colis
                </h3>
                
                <div class="package-selector">
                    <div class="select-box" id="selectBox">
                        <div class="tags-container" id="tagsContainer"></div>
                        <span  id="placeholder" style="min-width: 100%;">Sélectionnez un ou plusieurs types de colis</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 0 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </div>
                    
                    <div class="dropdown-options" id="dropdownOptions">
                        <!-- Options will be loaded dynamically -->
                    </div>
                    <input type="hidden" id="selectedValues" name="selectedValues">
                </div>
                
                <div class="package-list" id="packageList">
                    <!-- Packages will be added here dynamically -->
                </div>
            </div>

            <div class="form-section" style="border-bottom: none;">
                <button type="button" id="btnDevis" class="submit-btn">
                    <span id="btnText">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M5 6.25a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0v-3.5zm3.5 0a1.25 1.25 0 1 1 2.5 0v3.5a1.25 1.25 0 1 1-2.5 0v-3.5z"/>
                        </svg>
                        Calculer le Devis
                    </span>
                    <span id="btnLoading" class="hidden">
                        <span class="loading-spinner"></span>
                        Calcul en cours...
                    </span>
                </button>
            </div>
        </form>
    </div>

    <!-- Floating Action Buttons -->
    <div class="fab-container">
        <a href="#" class="fab fab-whatsapp" id="whatsappButton">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
            </svg>
        </a>
        <a href="#" class="fab fab-messenger">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                <path d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.639.639 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.639.639 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76zm5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z"/>
            </svg>
        </a>
    </div>

    <!-- Popup -->
    <div class="flyfret-popup" id="flyfretPopup">
        <h2 id="flyfretPopupTitle"></h2>
        <p id="flyfretPopupMessage"></p>
        <button id="flyfretPopupClose">Fermer</button>
    </div>
    <div class="flyfret-popup-overlay" id="flyfretPopupOverlay"></div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let colisCount = 1;
        const TAUX_CONVERSION = 656; // 1 EUR = 656 XOF
        const PRIX_CONSERVATION_ABIDJAN = 656; // Prix en XOF pour la conservation depuis Abidjan
        const PRIX_CONSERVATION_FRANCE = 1; // Prix en EUR pour la conservation depuis France
        
        $('#ville_depart').change(function() {
            const selectedCity = $(this).val();
            const $destinationSelect = $('#ville_destination');
            
            $destinationSelect.empty();
            $destinationSelect.append('<option value="">Sélectionnez...</option>');

            // Règles pour les villes d'arrivée
            if (['Paris', 'Lyon', 'Nancy'].includes(selectedCity)) {
                // Si départ de France, seule Abidjan est disponible
                $destinationSelect.append($('<option>').val('Abidjan').text('Abidjan'));
            } else if (selectedCity === 'Abidjan') {
                // Si départ d'Abidjan, les villes françaises sont disponibles
                $destinationSelect.append($('<option>').val('Paris').text('Paris'));
                $destinationSelect.append($('<option>').val('Lyon').text('Lyon'));
                $destinationSelect.append($('<option>').val('Nancy').text('Nancy'));
            }
        });

        $('#ville_depart').trigger('change');

        const selectBox = $('#selectBox');
        const dropdownOptions = $('#dropdownOptions');
        const tagsContainer = $('#tagsContainer');
        const placeholder = $('#placeholder');
        const selectedValuesInput = $('#selectedValues');
        const packageList = $('#packageList');
        
        let selectedOptions = [];
        let packageCounter = 1;
        let packageTypes = [];
        let packageNumbers = {};

        function updatePackageNumbers() {
            let packageNumber = 1;
            
            $('.package-item').each(function() {
                const packageId = $(this).attr('id');
                const packageType = $(this).data('package-type');
                
                $(this).find('.package-title').html(`
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                    </svg>
                    Colis N°${packageNumber} - ${packageType}
                `);
                
                const prixUnitaire = $(this).find('input[name*="prix_unitaire"]').val();
                const devise = $(this).find('input[name*="prix_unitaire"]').data('devise') || 'XOF';
                
                $(`.tag:contains("${packageType}")`).text(`Colis N°${packageNumber} - ${packageType} (${prixUnitaire} ${devise})`);
                
                packageNumber++;
            });
        }

        function loadPackageTypes() {
            const villeDepart = $('#ville_depart').val();
            const villeDestination = $('#ville_destination').val();

            if (!villeDepart || !villeDestination) {
                console.error('Les villes de départ et d\'arrivée doivent être sélectionnées.');
                return;
            }

            $.ajax({
                url: '{{ route("colis.types") }}',
                method: 'GET',
                data: {
                    ville_depart: villeDepart,
                    ville_destination: villeDestination
                },
                beforeSend: function() {
                    dropdownOptions.html('<div class="p-4 text-center text-gray-500"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="animate-spin mr-2"><path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/><path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/></svg> Chargement des types de colis...</div>');
                },
                success: function(response) {
                    console.log('Colis récupérés depuis la base de données:', response);
                    dropdownOptions.empty();
                    packageList.empty();

                    if (Object.keys(response).length === 0) {
                        dropdownOptions.append('<div class="text-gray-500 p-4 text-center">Aucun colis disponible pour cette combinaison.</div>');
                    } else {
                        packageTypes = response;
                        // Tri des options par ordre alphabétique
                        const sortedCategories = Object.keys(response).sort();
                        
                        sortedCategories.forEach(categorie => {
                            // Tri des colis par ordre alphabétique
                            const sortedColis = response[categorie].sort((a, b) => a.designation.localeCompare(b.designation));
                            
                            sortedColis.forEach(colis => {
                                // Déterminer la devise en fonction de la ville de départ
                                let devise = 'XOF';
                                if (['Paris', 'Lyon', 'Nancy'].includes(villeDepart)) {
                                    devise = 'EUR'; // Prix en EUR pour les villes françaises
                                }

                                const optionItem = $(`
                                    <div class="option-item" data-value="${colis.designation}" data-prix="${colis.prix}" data-devise="${devise}">
                                        <span class="option-checkbox"></span>
                                        <span>${colis.designation}</span>
                                        <span class="ml-auto text-sm font-medium text-gray-700"> ${colis.prix} ${devise}</span>
                                    </div>
                                `);
                                dropdownOptions.append(optionItem);
                            });
                        });
                    }
                },
                error: function(xhr) {
                    console.error('Erreur lors du chargement des types de colis:', xhr.responseJSON?.error || xhr.responseText);
                    dropdownOptions.html('<div class="text-red-500 p-4 text-center"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" class="mr-2"><path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg> Erreur lors du chargement des types de colis</div>');
                }
            });
        }

        function updateTags() {
            tagsContainer.empty();
            updatePackageNumbers();

            // Tri des options sélectionnées par ordre d'ajout
            selectedOptions.forEach((value) => {
                let typeName = value;
                let typePrice = '';
                let typeDevise = 'XOF';

                $.each(packageTypes, function(categorie, colisList) {
                    colisList.forEach(colis => {
                        if (colis.designation === value) {
                            typeName = colis.designation;
                            typePrice = colis.prix;
                            typeDevise = ['Paris', 'Lyon', 'Nancy'].includes($('#ville_depart').val()) ? 'EUR' : 'XOF';
                            // Correction ici : multiplier par 655 si Abidjan
                            if ($('#ville_depart').val() === 'Abidjan') {
                                typePrice = (parseFloat(colis.prix) * 655).toFixed(2);
                                typeDevise = 'XOF';
                            }
                        }
                    });
                });

                const packageNumber = $(`.package-item[data-package-type="${value}"]`)
                    .first()
                    .find('.package-title')
                    .text()
                    .match(/Colis N°(\d+)/)[1];

                const tag = $(`
                    <div class="tag">
                        Colis N°${packageNumber} - ${typeName} (${typePrice} ${typeDevise})
                        <span class="tag-remove" data-value="${value}">&times;</span>
                    </div>
                `);

                tagsContainer.append(tag);
            });

            $('.tag-remove').on('click', function(e) {
                e.stopPropagation();
                const value = $(this).data('value');

                selectedOptions = selectedOptions.filter(opt => opt !== value);
                $(`.option-item[data-value="${value}"]`).removeClass('selected');
                removePackageByType(value);

                updateTags();
                updatePlaceholder();
                updateHiddenInput();
            });
        }

        function updatePlaceholder() {
            placeholder.css('display', selectedOptions.length > 0 ? 'none' : 'block');
        }

        function updateHiddenInput() {
            selectedValuesInput.val(selectedOptions.join(','));
        }
        
        function removePackageByType(packageType) {
            $(`.package-item[data-package-type="${packageType}"]`).remove();
            delete packageNumbers[packageType];
            updatePackageNumbers();
        }

        function addPackage(type) {
            const packageId = `package-${packageCounter}`;
            packageCounter++;

            // Déterminer la devise en fonction de la ville de départ
            const villeDepart = $('#ville_depart').val();
            let devise = ['Paris', 'Lyon', 'Nancy'].includes(villeDepart) ? 'EUR' : 'XOF';
            let prixUnitaire = type.prix;

            // Si la ville de départ est Abidjan, multiplier le prix par 655
            if (villeDepart === 'Abidjan') {
                prixUnitaire = (parseFloat(prixUnitaire) * 655).toFixed(2);
                devise = 'XOF';
            }

            const packageItem = $(`
                <div class="package-item" id="${packageId}" data-package-type="${type.designation}">
                    <div class="package-header">
                        <div class="package-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                            </svg>
                            Colis N°${$('.package-item').length + 1} - ${type.designation}
                        </div>
                        <div class="package-actions">
                            <button type="button" class="remove-package" data-package-id="${packageId}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16" class="mr-1">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                                Supprimer
                            </button>
                        </div>
                    </div>
                    <div class="package-fields">
                        <div class="form-group">
                            <label for="${packageId}-quantity">Quantité</label>
                            <input type="number" id="${packageId}-quantity" name="colis[${packageCounter-1}][quantite]" min="1" value="1" class="quantity-input form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="${packageId}-value">Valeur Marchande </label>
                            <input type="number" id="${packageId}-value" name="colis[${packageCounter-1}][valeur_marchande]" min="0" step="0.01" value="0" class="form-control" required>
                            <div class="conservation-checkbox">
                                <input type="checkbox" id="${packageId}-conservation" name="colis[${packageCounter-1}][conservation]" value="1">
                                <label for="${packageId}-conservation">Conservation</label>
                                <span class="conservation-price">+${['Paris', 'Lyon', 'Nancy'].includes(villeDepart) ? '1 EUR' : '656 XOF'}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="total-price">
                                Total: <span id="${packageId}-total-price">${prixUnitaire} ${devise}</span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="colis[${packageCounter-1}][type]" value="${type.designation}">
                    <input type="hidden" name="colis[${packageCounter-1}][prix_unitaire]" value="${prixUnitaire}" data-devise="${devise}" data-base-price="${prixUnitaire}">
                </div>
            `);

            packageList.append(packageItem);
            console.log('Nouvelle option ajoutée:', packageList);
            updatePackageNumbers();

            // Gestion de la quantité
            $(`#${packageId}-quantity`).on('input', function() {
                const unitPrice = parseFloat($(`input[name="colis[${packageCounter-1}][prix_unitaire]"]`).val()) || 0;
                updatePackageTotalPrice(packageId, unitPrice, devise);
            });

            // Gestion de la case à cocher de conservation
            $(`#${packageId}-conservation`).change(function() {
                const isChecked = $(this).is(':checked');
                const basePrice = parseFloat($(this).closest('.package-item').find('input[name*="prix_unitaire"]').data('base-price'));
                console.log('Base price:', basePrice);
                let newPrice = basePrice;
                const villeDepart = $('#ville_depart').val();
                
                if (isChecked) {
                    // Ajouter le prix de conservation en fonction de la ville de départ
                    if (villeDepart === 'Abidjan') {
                        newPrice = parseFloat(basePrice) + PRIX_CONSERVATION_ABIDJAN;
                        console.log('Nouveau prix (Abidjan):', newPrice);
                    } else if (['Paris', 'Lyon', 'Nancy'].includes(villeDepart)) {
                        newPrice = parseFloat(basePrice) + PRIX_CONSERVATION_FRANCE;
                        console.log('Nouveau prix (France):', newPrice);
                    }
                }
                
                // Mettre à jour le prix unitaire
                $(this).closest('.package-item').find('input[name*="prix_unitaire"]').val(newPrice.toFixed(2));
                
                // Mettre à jour l'affichage du prix total
                const quantity = parseInt($(`#${packageId}-quantity`).val()) || 1;
                const totalPrice = quantity * newPrice;
                console.log('Total price:', totalPrice);
                $(`#${packageId}-total-price`).text(totalPrice.toFixed(2) + ' ' + devise);
                
                // Mettre à jour les tags
                updateTags();
            });

            packageItem.find('.remove-package').on('click', function() {
                const packageType = packageItem.data('package-type');
                packageItem.remove();

                selectedOptions = selectedOptions.filter(opt => opt !== packageType);
                $(`.option-item[data-value="${packageType}"]`).removeClass('selected');

                const remainingPackages = $(`.package-item[data-package-type="${packageType}"]`).length;
                if (remainingPackages === 0) {
                    delete packageNumbers[packageType];
                }

                updateTags();
                updatePlaceholder();
                updateHiddenInput();
            });
        }

        function updatePackageTotalPrice(packageId, unitPrice, devise) {
            const quantity = parseInt($(`#${packageId}-quantity`).val()) || 0;
            const totalPrice = quantity * unitPrice;
            $(`#${packageId}-total-price`).text(totalPrice.toFixed(2) + ' ' + devise);
        }

        selectBox.on('click', function(e) {
            e.stopPropagation();
            dropdownOptions.toggleClass('open');
            selectBox.toggleClass('open');
        });

        $(document).on('click', '.option-item:not(.category-header)', function(e) {
            e.stopPropagation();
            const value = $(this).data('value');
            const prix = $(this).data('prix');
            const devise = $(this).data('devise');
            
            if (selectedOptions.includes(value)) {
                selectedOptions = selectedOptions.filter(opt => opt !== value);
                $(this).removeClass('selected');
                removePackageByType(value);
            } else {
                selectedOptions.push(value);
                $(this).addClass('selected');
                
                let selectedType = null;
                $.each(packageTypes, function(categorie, colisList) {
                    colisList.forEach(colis => {
                        if (colis.designation === value) {
                            selectedType = {
                                designation: colis.designation,
                                prix: colis.prix
                            };
                        }
                    });
                });
                
                if (selectedType) {
                    addPackage(selectedType);
                }
            }
            
            updateTags();
            updatePlaceholder();
            updateHiddenInput();
            dropdownOptions.removeClass('open');
            selectBox.removeClass('open');
        });

        $(document).on('click', function(e) {
            if (!selectBox.is(e.target) && !dropdownOptions.is(e.target) && !$(e.target).closest('.dropdown-options').length) {
                dropdownOptions.removeClass('open');
                selectBox.removeClass('open');
            }
        });

        $('#btnDevis').click(async function () {
            const $btn = $(this);
            const $btnText = $('#btnText');
            const $btnLoading = $('#btnLoading');
            
            // Show loading state
            $btnText.addClass('hidden');
            $btnLoading.removeClass('hidden');
            $btn.prop('disabled', true);
            
            const modeTransport = $('input[name="mode_transport"]:checked').val();
            const villeDepart = $('#ville_depart').val();
            const villeDestination = $('#ville_destination').val();

            if (!villeDepart || !villeDestination || !modeTransport) {
                showFlyfretPopup('Erreur', 'Veuillez remplir tous les champs obligatoires.');
                $btnText.removeClass('hidden');
                $btnLoading.addClass('hidden');
                $btn.prop('disabled', false);
                return;
            }

            if (villeDepart === villeDestination) {
                showFlyfretPopup('Erreur', 'La ville de départ doit être différente de la ville de destination.');
                $btnText.removeClass('hidden');
                $btnLoading.addClass('hidden');
                $btn.prop('disabled', false);
                return;
            }

            if ($('.package-item').length === 0) {
                showFlyfretPopup('Erreur', 'Veuillez ajouter au moins un colis.');
                $btnText.removeClass('hidden');
                $btnLoading.addClass('hidden');
                $btn.prop('disabled', false);
                return;
            }   

            const colisData = [];
            const prixUnitaireData = {};
            let prixTotal = 0; // Initialiser le prix total
            
            $('.package-item').each(function () {
                const typeColis = $(this).data('package-type');
                const quantite = parseInt($(this).find('input[name*="quantite"]').val()) || 1;
                const valeurMarchande = parseFloat($(this).find('input[name*="valeur_marchande"]').val()) || 0;
                const prixUnitaire = parseFloat($(this).find('input[name*="prix_unitaire"]').val()) || 0;
                const devise = $(this).find('input[name*="prix_unitaire"]').data('devise') || 'XOF';
                const conservation = $(this).find('input[name*="conservation"]:checked').val() === '1';
                
                // Calculer le total pour ce colis
                const totalColis = prixUnitaire * quantite;
                
                // Ajouter au prix total
                prixTotal += totalColis;
                console.log('Prix total actuel:', prixTotal);

                colisData.push({
                    type: typeColis,
                    quantite: quantite,
                    valeur_marchande: valeurMarchande,
                    prix_unitaire: prixUnitaire,
                    devise: devise,
                    conservation: conservation,
                    total: totalColis
                });

                prixUnitaireData[typeColis] = prixUnitaire;
            });

            // Calculer le prix express en fonction de la ville de départ
            let prixExpress;
            if (['Paris', 'Lyon', 'Nancy'].includes(villeDepart)) {
                console.log(' le prix total est:', prixTotal);
                prixExpress = prixTotal + 2; // Ajouter 2 EUR pour les villes françaises
                console.log(' le prix express est:', prixExpress);
            } else {
                prixExpress = prixTotal + (2 * TAUX_CONVERSION); // Ajouter 2*656 XOF pour Abidjan
            }

            // Conversion en XOF si la ville de départ est Abidjan
            if (villeDepart === 'Abidjan') {
                prixTotal = prixTotal ;
                console.log(' le prix total est en XOF:', prixTotal);

                prixExpress = prixExpress ;
                console.log(' le prix express est en XOF:', prixExpress);
            } else {
                prixTotal = prixTotal.toFixed(2);
                prixExpress = prixExpress.toFixed(2);
            }

            const csrfToken = $('input[name="_token"]').val();
            const colisEncoded = encodeURIComponent(JSON.stringify(colisData));
            const prixUnitaireEncoded = encodeURIComponent(JSON.stringify(prixUnitaireData));

            try {
                // Envoyer les données au serveur pour enregistrement (si nécessaire)
                await $.ajax({
                    url: '{{ route("colis.calculate") }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: {
                        mode_transport: modeTransport,
                        ville_depart: villeDepart,
                        ville_destination: villeDestination,
                        colis: colisData,
                        prixUnitaire: prixUnitaireData,
                        prixTotal: prixTotal,
                        prixExpress: prixExpress
                    }
                });

                // Rediriger vers la page de détails avec les paramètres calculés
                window.location.href = `/details-devis?mode_expedition=${encodeURIComponent(modeTransport)}` +
                    `&ville_expedition=${encodeURIComponent(villeDepart)}` +
                    `&ville_retrait=${encodeURIComponent(villeDestination)}` +
                    `&prixTotal=${encodeURIComponent(prixTotal)}` +
                    `&prixExpress=${encodeURIComponent(prixExpress)}` +
                    `&type_colis=${colisEncoded}` +
                    `&prixUnitaire=${prixUnitaireEncoded}`;

            } catch (error) {
                console.error('Erreur AJAX:', error.responseJSON?.error || error.message);
                showFlyfretPopup('Erreur', error.responseJSON?.error || 'Erreur lors de l\'enregistrement. Redirection avec les données calculées localement.');
                
                // Rediriger quand même avec les données calculées localement
                window.location.href = `/details-devis?mode_expedition=${encodeURIComponent(modeTransport)}` +
                    `&ville_expedition=${encodeURIComponent(villeDepart)}` +
                    `&ville_retrait=${encodeURIComponent(villeDestination)}` +
                    `&prixTotal=${encodeURIComponent(prixTotal)}` +
                    `&prixExpress=${encodeURIComponent(prixExpress)}` +
                    `&type_colis=${colisEncoded}` +
                    `&prixUnitaire=${prixUnitaireEncoded}`;
            } finally {
                $btnText.removeClass('hidden');
                $btnLoading.addClass('hidden');
                $btn.prop('disabled', false);
            }
        });

        function showFlyfretPopup(title, message) {
            $('#flyfretPopupTitle').text(title);
            $('#flyfretPopupMessage').text(message);
            $('#flyfretPopupOverlay').fadeIn(200);
            $('#flyfretPopup').fadeIn(200);
        }

        $('#flyfretPopupClose, #flyfretPopupOverlay').click(function () {
            $('#flyfretPopupOverlay').fadeOut(200);
            $('#flyfretPopup').fadeOut(200);
        });

        loadPackageTypes();

        $('.transport-option').click(function() {
            $('.transport-option').removeClass('selected');
            $(this).addClass('selected');
            $(this).find('input[type="radio"]').prop('checked', true);
        });

        $('.transport-option:has(input[checked])').addClass('selected');

        $('#ville_depart, #ville_destination').change(function() {
            // Réinitialiser la sélection des colis et l'affichage
            selectedOptions = [];
            tagsContainer.empty();
            packageList.empty();
            updatePlaceholder();
            updateHiddenInput();
            loadPackageTypes();
        });

        // WhatsApp Button Functionality
        document.getElementById("whatsappButton").addEventListener("click", function(event) {
            event.preventDefault();
            const numero = "22507070707"; // Remplacez par votre numéro WhatsApp
            const message = encodeURIComponent("Bonjour, je souhaite obtenir un devis pour un envoi de colis.");
            const lienWhatsApp = "https://api.whatsapp.com/send?phone=" + numero + "&text=" + message;
            window.location.href = lienWhatsApp;
        });
    });
</script>
@endsection