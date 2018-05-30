$(function() {
    $("#typed").typed({
        strings: ["Versetze dich in die Rolle einer Frau im antiken Griechenland der vorklassischen Zeit.^1000<br>" +
            "Eine Zeit, in der griechische Kolonisten die Frauen der eroberten Kolonien einfach heirateten.^1500<br>" +
            "<br>" +
            " - Welche Rechte stehen einer Frau wie dir zu?^1000<br>" +
            " - Welche soziale Stellung hast du hier?^1000<br>" +
            " - Welche Regeln musst du beachten?^1000<br>" +
            "<br>" +
            "Jetzt kannst du es erfahren!^1000 Wähle eine der Städte 'Sparta', 'Gortyn oder 'Athen', indem du den jeweiligen Namen unten eintippst."
        ],
        typeSpeed: 10,
        backDelay: 1000,
        backSpeed: 10,
        startDelay: 5000,
        loop: false,
        contentType: 'html', // or text
        // defaults to false for infinite loop
        loopCount: false,
        callback: function() {
            foo();
        },
        resetCallback: function() {
            newTyped();
        }
    });
    $(".reset").click(function() {
        $("#typed").typed('reset');
    });
});

function newTyped() { /* A new typed object */ }

function foo() {
    console.log("Callback");
}

YUI().use("node", function(Y) {

    var COMMANDS = [{
            name: "Sparta",
            handler: function sparta() {
                outputToConsole("Jetzt bekommst du etwas über Sparta erzählt.");
            }
        },

        {
            name: "Gortyn",
            handler: function gortyn() {
                outputToConsole("Jetzt bekommst du etwas über Gortyn erzählt.");
            }
        },

        {
            name: "Athen",
            handler: function athen() {
                outputToConsole("Jetzt bekommst du etwas über Athen erzählt.");
            }
        },


        {
            name: "hilfe",
            handler: hilfe
        },

        {
            name: "Hilfe",
            handler: hilfe
        }
    ];

    function hilfe() {
        outputToConsole("Unterstützte Befehle: 'Sparta', 'Gortyn', 'Athen', 'Hilfe'");
    }

    function processCommand() {
        var inField = Y.one("#in");
        var input = inField.get("value");
        var parts = input.replace(/\s+/g, " ").split(" ");
        var command = parts[0];
        var args = parts.length > 1 ? parts.slice(1, parts.length) : [];

        inField.set("value", "");

        for (var i = 0; i < COMMANDS.length; i++) {
            if (command === COMMANDS[i].name) {
                COMMANDS[i].handler(args);
                return;
            }
        }

        outputToConsole("Unsupported Command: " + command);
    }

    function outputToConsole(text) {
        var p = Y.Node.create("<p>" + text + "</p>");
        Y.one("#out").append(p);
        p.scrollIntoView();
    }

    Y.on("domready", function(e) {
        Y.one("body").setStyle("paddingBottom", Y.one("#in").get("offsetHeight"));
        Y.one("#in").on("keydown", function(e) {
            if (e.charCode === 13) {
                processCommand();
            }
        });
    });
});
