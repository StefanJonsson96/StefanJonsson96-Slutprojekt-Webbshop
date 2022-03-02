Slutprojekt-Webbshop

Om du får fel på importen av databas så kör dessa två rader för att höja högsta allowed packed.

set global net_buffer_length=1000000; 
set global max_allowed_packet=1000000000;
