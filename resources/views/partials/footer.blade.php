<footer class="footer-section" style="background: linear-gradient(135deg, #8022F4 0%, #F20CF3 100%); color: white;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="footer-wrapper">
                        <h3 style="color: white; border-bottom: 2px solid rgba(255,255,255,0.2); padding-bottom: 8px; margin-bottom: 20px;">Localisation</h3>
                        <ul class="location list-unstyled">
                            <li class="d-flex mb-3">
                                <i class="fas fa-map-marker-alt mt-1 me-3" style="color: #F20CF3;"></i>
                                <div>
                                    <strong>France</strong><br>
                                    Lyon <br>
                                    Paris <br>
                                    Nancy <br>
                                  
                                </div>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-map-marker-alt mt-1 me-3" style="color: #F20CF3;"></i>
                                <div>
                                    <strong>Côte d'Ivoire</strong><br>
                                    Abidjan 
                                </div>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-map-marker-alt mt-1 me-3" style="color: #F20CF3;"></i>
                                <div>
                                    <strong>Etats-Unis</strong><br>
                                    {{-- New York --}}
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="footer-wrapper">
                        <h3 style="color: white; border-bottom: 2px solid rgba(255,255,255,0.2); padding-bottom: 8px; margin-bottom: 20px;">Contact</h3>
                        <ul class="location list-unstyled">
                            <li class="d-flex mb-3">
                                <i class="fas fa-phone-alt mt-1 me-3" style="color: #F20CF3;"></i>
                                <div>
                                    <strong>France</strong><br>
                                    +33 554543171
                                </div>
                            </li>
                            <li class="d-flex">
                                <i class="fas fa-phone-alt mt-1 me-3" style="color: #F20CF3;"></i>
                                <div>
                                    <strong>Côte d'Ivoire</strong><br>
                                    +225 2722304819<br>
                                    +225 0594946565
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-wrapper">
                        <h3 style="color: white; border-bottom: 2px solid rgba(255,255,255,0.2); padding-bottom: 8px; margin-bottom: 20px;">Horaire</h3>
                        <ul class="location list-unstyled mb-4">
                            <li class="d-flex mb-3">
                                <i class="far fa-clock mt-1 me-3" style="color:#F20CF3;"></i>
                                <div>
                                    <strong>Lundi - Samedi</strong><br>
                                    9h - 19h
                                </div>
                            </li>
                            <li class="d-flex">
                                <i class="far fa-clock mt-1 me-3" style="color: #F20CF3;"></i>
                                <div>
                                    <strong>Dimanche</strong><br>
                                    14h - 19h
                                </div>
                            </li>
                        </ul>
                        
                        <h3 style="color: white; border-bottom: 2px solid rgba(255,255,255,0.2); padding-bottom: 8px; margin-bottom: 20px;">Suivez-nous</h3>
                        <ul class="social-icon list-unstyled d-flex">
                            <li class="me-3"><a href="https://www.facebook.com/p/Exp%C3%A9dition-de-colis-by-Fly-Fret-100090511771224/?_rdr " target="_blank" style="background: rgba(255,255,255,0.2);"><i class="fab fa-facebook-f text-white"></i></a></li>
                            <li class="me-3"><a href="https://www.instagram.com/flyfret/" target="_blank" style="background: rgba(255,255,255,0.2);"><i class="fab fa-instagram text-white"></i></a></li>
                            {{-- <li><a href="https://www.tiktok.com/" target="_blank" style="background: rgba(255,255,255,0.2);"><i class="fab fa-tiktok text-white"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="copy-right text-center py-3 mt-4" style="border-top: 1px solid rgba(255,255,255,0.2);">
                <p class="mb-0">© 2023 FlyFret International Group. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Button -->
    <div class="whatsapp-button">
        <a href="#" class="whatsapp-btn" id="whatsappButton" style="background: linear-gradient(135deg, #25D366, #128C7E);">
            <i class="fab fa-whatsapp fa-lg"></i>
        </a>
        
        <select id="whatsappSelect" class="form-select d-none">
            <option value="">Sélectionnez une ville</option>
            <option value="+33751551845">Paris</option>
            <option value="+33751455595">Lyon</option>
            <option value="+33751455595">Nancy</option>
            <option value="+225 0594946565">Abidjan</option>
        </select>
        
        <a href="https://www.facebook.com/p/Exp%C3%A9dition-de-colis-by-Fly-Fret-100090511771224/?_rdr " class="messenger-btn" target="_blank" style="background: linear-gradient(135deg, #006AFF, #0084FF);">
            <i class="fab fa-facebook-messenger fa-lg"></i>
        </a>
    </div>

    <!-- Style CSS amélioré -->
    <style>
        .footer-section {
            padding: 60px 0 20px;
            position: relative;
            overflow: hidden;
        }
        
        .footer-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.05);
            z-index: 0;
        }
        
        .footer-wrapper {
            position: relative;
            z-index: 1;
        }
        
        .footer-section h3 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 20px;
        }
        
        .footer-section ul li {
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }
        
        .footer-section ul li:hover {
            transform: translateX(5px);
        }
        
        .social-icon a {
            display: inline-block;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            backdrop-filter: blur(5px);
        }
        
        .social-icon a:hover {
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            background: rgba(255,255,255,0.3) !important;
        }
        
        .whatsapp-button {
            position: fixed;
            right: 20px;
            bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 15px;
            z-index: 1000;
        }
        
        .whatsapp-btn, .messenger-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            color: white;
            font-size: 24px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .whatsapp-btn::after, .messenger-btn::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255,255,255,0.1);
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }
        
        .whatsapp-btn:hover::after, .messenger-btn:hover::after {
            transform: translateY(0);
        }
        
        .whatsapp-btn:hover, .messenger-btn:hover {
            transform: scale(1.1);
        }
        
        #whatsappSelect {
            position: absolute;
            right: 80px;
            bottom: 0;
            width: 200px;
            border-radius: 20px;
            border: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .copy-right p {
            font-size: 0.9rem;
            opacity: 0.8;
        }
    </style>

    <!-- Script pour le bouton WhatsApp -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const whatsappButton = document.getElementById('whatsappButton');
            const whatsappSelect = document.getElementById('whatsappSelect');
            
            whatsappButton.addEventListener('click', function(e) {
                e.preventDefault();
                
                if (whatsappSelect.classList.contains('d-none')) {
                    whatsappSelect.classList.remove('d-none');
                    setTimeout(() => {
                        if (!whatsappSelect.classList.contains('d-none')) {
                            whatsappSelect.classList.add('d-none');
                        }
                    }, 10000);
                } else {
                    whatsappSelect.classList.add('d-none');
                }
            });
            
            whatsappSelect.addEventListener('change', function() {
                const numero = this.value.trim();
                if (numero) {
                    const message = encodeURIComponent("Bonjour FlyFret, je vous contacte via WhatsApp concernant vos services d'import-export !");
                    const lienWhatsApp = "https://wa.me/" + numero.replace(/\s+/g, '') + "?text=" + message;
                    window.open(lienWhatsApp, '_blank');
                    this.classList.add('d-none');
                }
            });
            
            // Fermer le select si on clique ailleurs
            document.addEventListener('click', function(e) {
                if (!whatsappButton.contains(e.target) && !whatsappSelect.contains(e.target)) {
                    whatsappSelect.classList.add('d-none');
                }
            });
        });
    </script>