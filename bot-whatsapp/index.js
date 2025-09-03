const { Client } = require('whatsapp-web.js');
const qrcode = require('qrcode-terminal');
const firebase = require('firebase');

const firebaseConfig = {
  apiKey: "AIzaSyBPZPPUt72C5MUm1WBbL9udLENeUnaj6Oc",
  authDomain: "registros-29b03.firebaseapp.com",
  databaseURL: "https://registros-29b03-default-rtdb.firebaseio.com",
  projectId: "registros-29b03",
  storageBucket: "registros-29b03.appspot.com",
  messagingSenderId: "441228504173",
  appId: "1:441228504173:web:5d991bf1642ddb9b88a364"
};

firebase.initializeApp(firebaseConfig);
const db = firebase.database();

const client = new Client();

client.on('qr', qr => {
    console.log('📲 Escaneá este QR con WhatsApp:');
    qrcode.generate(qr, { small: true });
});

client.on('ready', () => {
    console.log('✅ WhatsApp Web conectado');
});

client.on('message_ack', (msg, ack) => {
    if (ack === 3) { // leído
        console.log(`📖 Mensaje leído: ${msg.body}`);
        db.ref("confirmaciones").push({
            mensaje: msg.body,
            estado: "leído",
            timestamp: Date.now()
        });
        console.log("✅ Guardado en Firebase");
    }
});

client.initialize();
