<p>
    Hai ricevuto un nuovo messaggio inviato tramite il tuo form su Boolpress v3.0, nello specifico: <br>
        Il form è stato inviato da : {{ $lead->name }} <br>
        La mail inserita per rispondere : {{ $lead->email_address }} <br>
        Contenuto del messaggio: <br>
        {{ $lead->message }}
</p>