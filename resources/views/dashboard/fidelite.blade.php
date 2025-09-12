@extends('dashboard.profile')
@section('title', 'Programme de Fidélité')
@section('contentChild')

    <div class="content">
         <section class="loyalty-program">
                    <h2 class="section-title"><i class="fas fa-award"></i> Programme de Fidélité</h2>
                    
                    <div class="progress-container">
                        <h3>Vos Points: {{ $points }}/30</h3>
                        <div class="progress-bar" style="position: relative;">
                            <div class="progress" id="loyalty-progress" style="width: {{ $progress }}%"></div>
                            <span class="milestone" style="left: 33%;">Bronze<br><small>10 colis</small></span>
                            <span class="milestone" style="left: 66%;">Argent<br><small>20 colis</small></span>
                            <span class="milestone" style="left: 100%;">Or<br><small>30 colis</small></span>
                        </div>
                        <div class="progress-info">
                            <span>Niveau Actuel: {{ $niveau }}</span>
                            @if($next)
                                <span>Prochain niveau: {{ $next }} colis</span>
                            @else
                                <span>Niveau maximal atteint</span>
                            @endif
                        </div>
                    </div>
                    
                    <h3 class="section-title"><i class="fas fa-gifts"></i> Vos Récompenses</h3>
                    
                    <div class="rewards">
                        <div class="reward-card {{ $colisCount >= 5 ? '' : 'locked' }}">
                            <i class="fas fa-truck"></i>
                            <h3>Livraison Gratuite</h3>
                            <p>1 livraison offerte pour 5 colis envoyés</p>
                        </div>
                        
                        <div class="reward-card {{ $colisCount >= 10 ? '' : 'locked' }}">
                            <i class="fas fa-percentage"></i>
                            <h3>Réduction 10%</h3>
                            <p>10% de réduction sur votre prochain envoi</p>
                        </div>
                        
                        <div class="reward-card {{ $colisCount >= 20 ? '' : 'locked' }}">
                            <i class="fas fa-star"></i>
                            <h3>Service Premium</h3>
                            <p>Accès prioritaire au support client</p>
                        </div>
                        
                        <div class="reward-card {{ $colisCount >= 30 ? '' : 'locked' }}">
                            <i class="fas fa-plane"></i>
                            <h3>Expédition Express</h3>
                            <p>Livraison express gratuite</p>
                        </div>
                    </div>
                </section>
    </div>
    <style>
.milestone {
    position: absolute;
    top: -35px;
    transform: translateX(-50%);
    font-size: 12px;
    color: #333;
    text-align: center;
    font-weight: bold;
    pointer-events: none;
}
</style>

@endsection