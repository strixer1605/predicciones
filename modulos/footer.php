<div class="footer mx-0">
    <div class="container">
        <div class="row team mx-0">
            <h3>Nuestro Equipo</h3>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row mt-3">
                    <div class="col-12 team-member">
                        <h5>Expósito Santiago</h5>
                        <a href="https://www.instagram.com/santi.expos._/"><img src="../../imagenes/instagram.png" alt="Instagram"></a>
                    </div>
                    <div class="col-12 team-member">
                        <h5>Lorenzo Joaquín</h5>
                        <a href="https://www.instagram.com/joaco_zkl/"><img id="imgL" src="../../imagenes/instagram.png" alt="Instagram"></a>
                    </div>
                    <div class="col-12 team-member">
                        <h5>Maldonado Felipe</h5>
                        <a href="https://www.instagram.com/felipemaldonado._/"><img src="../../imagenes/instagram.png" alt="Instagram"></a>
                    </div>
                </div>
            </div>
            <div id="containerLogos" class="col-md-6">
                <div id="logosFooter" class="row text-center">
                    <div class="col-6 mb-3 mb-md-0">
                        <img class="img-fluid" style="max-height: 100px;" src="../../imagenes/logoblanco.webp" alt="Logo Blanco">
                    </div>
                    <div class="col-6">
                        <img class="img-fluid" src="../../imagenes/copaAmericaFooter.webp" alt="Copa América">
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="text-align: center;">
            <div class="col-12">
                <h6>7Mo C - Programación - 2024 - ∞</h6>
            </div>
            <div class="col-12">
                <a style="color: #003282;" href="https://www.youtube.com/watch?v=UsVJc_pApGg&t=17s">OE OE OE</a>
            </div>
            <div class="col-12">
                <span>Escuela de Educación Secundaria Técnica N°1 “Raúl Scalabrini Oriz”</span>
            </div>
        </div>
    </div>
</div>
<style>
    .footer {
    background-color: #003282;
    width: 100%;
    color: white;
    padding: 10px 0;
    position: relative;
    /* margin-top: 20px; */
    box-shadow: 0 -4px 6px -1px rgba(100, 149, 237, 0.6); /* Sombra clara azul */
    margin: 0 auto;
}

.team h3 {
    position: relative;
}

.team h3::after {
    content: '';
    display: block;
    width: 191px; /* Ancho del pseudo-elemento */
    height: 3px; /* Alto del pseudo-elemento */
    background-color: #0195FE; /* Color del pseudo-elemento */
    position: absolute;
    bottom: -10px; /* Ajusta la distancia desde abajo */
    left: 0; /* Ajusta la posición desde la izquierda */
}


.team-member {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.team-member img {
    margin-left: 100px; /* Espacio entre el nombre y el icono de Instagram */
    height: 30px;
}

#imgL{
    margin-left: 112px;
}

@media (min-width: 375px) {
    .team-member img{
        margin-left: 157px;
    }
    #imgL{
        margin-left: 169px;
    }
}

@media (min-width: 425px) {
    .team-member img{
        margin-left: 207px;
    }
    #imgL{
        margin-left: 219px;
    }
}

@media (min-width: 768px) {
    .team-member img{
        margin-left: 35px;
    }
    #imgL{
        margin-left: 47px;
    }
    #containerLogos{
        display: flex;
        justify-content: flex-end;
    }

}

@media (max-width: 768px) {
    #logosFooter{
        text-align: center;
    }
}
</style>