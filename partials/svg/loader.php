<svg width="100px" height="4px" viewBox="0 0 100 4" xmlns="http://www.w3.org/2000/svg">
    <style>
        #bar {
            transform-origin: left;
            animation: move 1.25s infinite ease;
        }

        @keyframes move {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }
    </style>
    <rect id="bar" x="0" y="0" width="100" height="4"></rect>
</svg>