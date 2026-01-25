   document.addEventListener("DOMContentLoaded", () => {
            const betAmount = document.getElementById('betAmount');
            const rollBtn = document.getElementById("rollBtn");
            const status = document.getElementById('status');
            const diceNumber = document.getElementById('diceNumber');
            const rangeStart = document.getElementById('rangeStart');
            const rangeEnd = document.getElementById('rangeEnd');
            const leftSection = document.getElementById('leftSection');
            const winSection = document.getElementById('winSection');
            const rightSection = document.getElementById('rightSection');
            const diceResult = document.getElementById('diceResult');
            const rangeStartLabel = document.getElementById('rangeStartLabel');
            const rangeEndLabel = document.getElementById('rangeEndLabel');
            const displayStart = document.getElementById('displayStart');
            const displayEnd = document.getElementById('displayEnd');

            function updateBar() {
                const start = parseInt(rangeStart.value) || 0;
                const end = parseInt(rangeEnd.value) || 100;

                if (start >= end) {
                    rangeEnd.value = start + 1;
                    return updateBar();
                }

                leftSection.style.width = start + '%';
                winSection.style.left = start + '%';
                winSection.style.width = (end - start) + '%';
                rightSection.style.left = end + '%';
                rightSection.style.width = (100 - end) + '%';

                rangeStartLabel.textContent = start;
                rangeEndLabel.textContent = end;
                displayStart.textContent = start;
                displayEnd.textContent = end;
            }

            rangeStart.addEventListener('input', updateBar);
            rangeEnd.addEventListener('input', updateBar);

            rollBtn.addEventListener("click", () => {
                const bet = parseFloat(betAmount.value);
                
                if (bet <= 0 || isNaN(bet)) {
                    status.textContent = 'Enter a valid bet amount';
                    return;
                }

                const start = parseInt(rangeStart.value);
                const end = parseInt(rangeEnd.value);

                if (start >= end) {
                    status.textContent = 'Invalid range!';
                    return;
                }

                rollBtn.disabled = true;
                status.textContent = "Rolling...";
                diceResult.style.display = 'none';

                setTimeout(() => {
                    const roll = (Math.random() * 100).toFixed(2);
                    diceNumber.textContent = roll;
                    
                    diceResult.style.left = roll + '%';
                    diceResult.style.display = 'block';

                    const rollNum = parseFloat(roll);
                    const won = rollNum >= start && rollNum <= end;

                    if (won) {
                        status.textContent = "YOU WIN!";
                        status.style.color = "#00ff00";
                        diceNumber.style.color = "#00ff00";
                    } else {
                        status.textContent = "YOU LOSE!";
                        status.style.color = "#ff0000";
                        diceNumber.style.color = "#ff0000";
                    }

                    rollBtn.disabled = false;
                }, 500);
            });

            updateBar();
        });