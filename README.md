Cos’è
GymHub è un gestionale orientato verso il mondo del fitness, sviluppato per semplificare la gestione delle palestre. È un software completo progettato per offrire una soluzione efficace alle sfide quotidiane dei gestori, il suo obiettivo è ottimizzare le operazioni e migliorare l'efficienza nella gestione delle attività interne alla palestra.

Cosa fa
GymHub offre una vasta gamma di funzionalità per gestire in modo efficiente una palestra o un centro fitness. Il gestionale permette ai proprietari delle palestre di mantenere un registro completo dei clienti e del suo staff, con informazioni personali, dati di contatto e altri dettagli rilevanti. 
Inoltre, consente di gestire gli abbonamenti, tenendo traccia delle scadenze. Il sistema offre anche la possibilità di salvare diete personalizzate e schede di allenamento, fornendo un supporto completo per la pianificazione e il monitoraggio delle attività fisiche.
GymHub fornisce anche report e analisi dettagliate, che consentono ai gestori di monitorare le prestazioni della palestra, identificare tendenze e prendere decisioni informate per migliorare l'efficienza e la redditività.
Tecnologie utilizzate
Laravel: GymHub è costruito utilizzando il noto framework PHP Laravel. Questa scelta garantisce una base di codice solida, ben strutturata e altamente sicura. Grazie al pattern MVC, l'applicazione è organizzata in modo strutturato, con una chiara separazione tra dati, presentazione e logica di controllo, contribuendo ulteriormente all'efficienza e alla chiarezza del codice.
Inoltre Laravel fornisce un sistema di login preconfigurato e personalizzabile che abbiamo deciso di sfruttare.

MariaDB: come DBMS abbiamo scelto MariaDB, un sistema di gestione di database affidabile, scalabile e ad alte prestazioni, garantendo che tutte le informazioni sensibili siano conservate in modo sicuro e accessibile in ogni momento.

Tailwind CSS: per il lato frontend, abbiamo deciso di utilizzare il framework Tailwind. Questo consente di creare un'interfaccia utente moderna, intuitiva e altamente personalizzabile. L'approccio basato su classi di Tailwind semplifica il processo di sviluppo, consentendo una rapida personalizzazione dell'aspetto dell'applicazione. 
In aggiunta abbiamo utilizzato una libreria di Tailwind chiamata Flowbite che ci ha fornito componenti predefinite per il frontend.

Npm e Composer: abbiamo usato Npm come gestore dei pacchetti JavaScript e Composer come gestore dei pacchetti Php. Questi strumenti semplificano il processo di integrazione di nuove funzionalità e librerie.
Procedura di avvio
Dopo aver scaricato il progetto, configurare il DB tramite le migration ed eventualmente sfruttare i seed per popolarlo con i seguenti comandi: 
php artisan migrate
php artisan db:seed
A questo punto eseguire i comandi di avvio del progetto:
npm run dev
php artisan serve


Progetto realizzato da Alessio Gesuelli, Andrea Giuliani e Lorenzo Salvatori
