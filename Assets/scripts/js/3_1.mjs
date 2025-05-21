function montrerRenard() {
            const zone = document.getElementById('bidonZone');
            zone.innerHTML = "🦊 Le renard apparaît entre les buissons, observant les alentours avec curiosité.";
            zone.style.background = "#ffe5e0";
            zone.style.color = "#b03a2e";
        }
        function montrerChouette() {
            const zone = document.getElementById('bidonZone');
            zone.innerHTML = "🦉 La chouette hulule doucement, perchée sur une branche dans la nuit étoilée.";
            zone.style.background = "#e8f4fa";
            zone.style.color = "#154360";
        }
        function montrerCerf() {
            const zone = document.getElementById('bidonZone');
            zone.innerHTML = "🦌 Le cerf traverse la clairière, majestueux et silencieux sous la lumière du matin.";
            zone.style.background = "#eafaf1";
            zone.style.color = "#145a32";
        }
        function changerAmbiance() {
            const zone = document.getElementById('bidonZone');
            zone.innerHTML = "🌲 La forêt s'illumine de mille couleurs, les animaux s'éveillent et la vie reprend son cours.";
            zone.style.background = "#f9e79f";
            zone.style.color = "#7d6608";
        }
        function resetBidon() {
            const zone = document.getElementById('bidonZone');
            zone.innerHTML = "Cliquez sur les boutons pour faire apparaître un animal ou changer l'ambiance de la forêt !";
            zone.style.background = "";
            zone.style.color = "";
        }