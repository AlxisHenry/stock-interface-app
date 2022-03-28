export function consoleLog(message, type) {
        switch (type) {
                case 's':
                        const Success = 'font-size: 15px; color: green; text-decoration: underline;';
                        console.log(`%c${message}`,`${Success}`);
                        break;
                case 'e':
                        const Error = 'font-size: 15px; color: red; text-decoration: underline;';
                        console.log(`%c${message}`,`${Error}`);
                        break;
                default:
                        const Default = 'font-size: 15px; color: white; text-decoration: underline;';
                        console.log(`%c${message}`,`${Default}`);
                        break;

        }
}