<?php 
    /* DICHIARAZIONE VARIABILI */
    /* PRENDI I VALORI DAL HTML */
    $lunghezzaPassword = isset($_GET['passwordLunghezza']) ? intval($_GET['passwordLunghezza']) : 0;
    $ripetizioneCarattere = isset($_GET['repeat']) && $_GET['repeat'] === 'yes';

    /* ARRAY */
    $alfabetoPiccolo = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
    $alfabetoMaiuscolo = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
    $numeriInteri = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

    /* UNISCI ARRAY */
    $alfabetoCompleto = array_merge($alfabetoPiccolo, $alfabetoMaiuscolo, $numeriInteri);
    $lunghezzaAlfabetCompleto = count($alfabetoCompleto);

    $passwordGenerata="";
    
        /* CICLO PER POPOLARE LA PASSWORD CON IL VALORE DELL'ALFABETO COMPLETO (IN BASE AGLI INDICI) */
        for ($i = 0; $i < $lunghezzaPassword; $i++) {
            $indiceCasuale = mt_rand(0, $lunghezzaAlfabetCompleto - 1);
            $carattere = $alfabetoCompleto[$indiceCasuale];

            /* SE SI E' SELEZIONATO SI NELLA RIPETIZIONE CARATTERE, RIPETI, SENNò MISCHIA */
            if ($ripetizioneCarattere) {
                $passwordGenerata .= $carattere;
            } else {
                $passwordGenerata .= str_shuffle($carattere);
            }
        }
        
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="container mt-5">
            <div class="row">
                <div class="col text-center">
                   <h1>STRONG PASSWORD GENERATOR</h1> 
                </div>
                <div class="row">
                    <div class="col text-center">
                        <h2 class="text-white">Genera una password sicura</h2>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="container mt-1">
            <div class="row">
                <div class="col-5"></div>
                <div class="col-5 p-3">
                    <label for="passwordGenerata"><?php if (isset($passwordGenerata)) echo $passwordGenerata; ?></label>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
        <div class="container">
            <form>
                <div class="row mt-3 pt-3">
                    <div class="col-6">
                        <label for="">Lunghezza password</label>
                    </div>
                    <div class="col-6">
                        <input type="number" name="passwordLunghezza">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <label for="">Consenti ripetizioni di uno o più caratteri:</label>
                    </div>
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="repeat" id="repeatYes">
                            <label class="form-check-label" for="repeatYes">Si</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="repeat" id="repeatNo">
                            <label class="form-check-label" for="repeatNo">No</label>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 pb-3">
                <div class="col">
                    <div class='d-flex'>
                        <button class="me-3" type="submit">Invia</button>
                        <button type="submit">Annulla</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<style>
    body{
        background-color: #001632;
    }
    h1{
        color: #808b99;
    }
    main .container:nth-child(1){
        background-color: #cff4fc !important;
        border-radius: 6px !important;
    }
    main .container:nth-last-child(1){
        background-color: white !important;
        border-radius: 6px !important;
    }
</style>