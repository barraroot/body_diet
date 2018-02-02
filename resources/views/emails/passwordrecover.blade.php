<!DOCTYPE html>
<html lang="pt_BR">
    <head>
        <meta charset="UTF-8">
        <title>BodyDiet - Alimentação Saudável</title>
        <meta name="theme-color" content="#E8680D"> <!-- COR DO CHROME -->
    </head>
    <body>
        <div class="content container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <img src="{{asset('images/logo.png')}}" alt="Body Diet - Alimentação saudavel" />
                    <h3>Recuperção de senha</h3>
                    <p>
                        Para recuperar sua senha <a href="{{$data['link']}}">Clique aqui</a> ou copia e cole em seu navegador o seguinte link {{$data['link']}}
                    </p>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>      
</body>
</html>