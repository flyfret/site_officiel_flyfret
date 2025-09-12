<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion | FlyFret</title>
  <style>
    :root {
      --primary: #6C63FF;
      --primary-dark: #564FD9;
      --accent: #FF6584;
      --white: #FFFFFF;
      --light: #F8FAFC;
      --gray: #A0AEC0;
      --dark: #2D3748;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    }

    body {
      background: url('/assets/img/image1.jpg') center/cover no-repeat fixed;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 2rem;
    }

    .login-container {
      width: 100%;
      max-width: 550px;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 24px;
      overflow: hidden;
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.3);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .login-container:hover {
      transform: translateY(-5px);
      box-shadow: 0 30px 60px -10px rgba(0, 0, 0, 0.3);
    }

    .login-header {
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      padding: 2.5rem 0;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .login-header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: radial-gradient(circle at 20% 50%, rgba(255,255,255,0.15) 0%, rgba(255,255,255,0) 50%);
      animation: pulse 8s infinite alternate;
    }

    .login-logo {
      width: 150px;
      height: auto;
      position: relative;
      z-index: 2;
      filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));
      background: white;
      padding: 10px;
      border-radius: 50%;
    }

    .login-body {
      padding: 3rem;
    }

    .login-title {
      font-size: 2rem;
      color: var(--dark);
      text-align: center;
      margin-bottom: 2rem;
      font-weight: 700;
      position: relative;
    }

    .login-title::after {
      content: '';
      display: block;
      width: 80px;
      height: 4px;
      background: linear-gradient(to right, var(--primary), var(--accent));
      margin: 1rem auto 0;
      border-radius: 2px;
    }

    .input-group {
      margin-bottom: 1.75rem;
      position: relative;
    }

    .input-icon {
      position: absolute;
      left: 20px;
      top: 50%;
      transform: translateY(-50%);
      width: 20px;
      height: 20px;
      z-index: 2;
    }

    .login-input {
      width: 100%;
      padding: 1.1rem 1.5rem 1.1rem 3.5rem;
      border: 2px solid rgba(0, 0, 0, 0.1);
      border-radius: 12px;
      font-size: 1rem;
      color: var(--dark);
      transition: all 0.3s ease;
      background-color: var(--light);
    }

    .login-input:focus {
      outline: none;
      border-color: var(--primary);
      background-color: var(--white);
      box-shadow: 0 0 0 4px rgba(108, 99, 255, 0.15);
    }

    .login-btn {
      width: 100%;
      padding: 1.1rem;
      background: linear-gradient(135deg, var(--primary), var(--primary-dark));
      color: var(--white);
      border: none;
      border-radius: 12px;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-top: 0.5rem;
      box-shadow: 0 4px 15px rgba(108, 99, 255, 0.3);
      position: relative;
      overflow: hidden;
    }

    .login-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(108, 99, 255, 0.4);
    }

    .login-btn:active {
      transform: translateY(0);
    }

    .login-footer {
      text-align: center;
      margin-top: 2rem;
      font-size: 0.95rem;
      color: var(--gray);
    }

    .login-link {
      color: var(--primary);
      font-weight: 600;
      text-decoration: none;
      transition: all 0.2s ease;
      position: relative;
    }

    .login-link:hover {
      color: var(--primary-dark);
      text-decoration: underline;
    }

    @keyframes pulse {
      0% { opacity: 0.5; transform: scale(1); }
      100% { opacity: 0.8; transform: scale(1.1); }
    }

    @media (max-width: 768px) {
      .login-container {
        max-width: 90%;
      }
      
      .login-body {
        padding: 2rem;
      }
      
      .login-header {
        padding: 2rem 0;
      }
    }

    @media (max-width: 480px) {
      body {
        padding: 1rem;
      }
      
      .login-body {
        padding: 1.5rem;
      }
      
      .login-input {
        padding: 1rem 1.25rem 1rem 3rem;
      }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-header">
      <img src="/assets/img/logo (2).png" alt="FlyFret" class="login-logo">
    </div>
    
    <div class="login-body">
      <h1 class="login-title">Connexion</h1>
      
      @if ($errors->any())
      <div class="alert alert-danger" style="color: red;">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
      
      <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        
        <div class="input-group">
          <img src="/assets/img/maile.png" alt="Email" class="input-icon">
          <input 
            class="login-input" 
            type="email" 
            name="email" 
            placeholder="Adresse email" 
            required
          />
        </div>
        
        <div class="input-group">
          <img src="/assets/img/passe.png" alt="Mot de passe" class="input-icon">
          <input 
            class="login-input" 
            type="password" 
            name="password" 
            placeholder="Mot de passe" 
            required
          />
        </div>
        
        <button type="submit" class="login-btn">SE CONNECTER</button>
      </form>
      
      <div class="login-footer">
        <p>Vous n'avez pas encore de compte ? <a href="{{ route('inscription.form') }}" class="login-link">Créez-en un dès maintenant pour profiter de nos services !</a></p>
      </div>
    </div>
  </div>
</body>
</html>
