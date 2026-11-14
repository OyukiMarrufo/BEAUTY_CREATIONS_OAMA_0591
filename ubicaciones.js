const ubicacionesData = {
    "México": {
        "Aguascalientes": ["Aguascalientes", "Jesús María", "Calvillo", "Rincón de Romos"],
        "Baja California": ["Tijuana", "Mexicali", "Ensenada", "Playas de Rosarito", "Tecate"],
        "Baja California Sur": ["La Paz", "Los Cabos", "Cabo San Lucas", "San José del Cabo", "Comondú"],
        "Campeche": ["San Francisco de Campeche", "Ciudad del Carmen", "Champotón"],
        "Chiapas": ["Tuxtla Gutiérrez", "Tapachula", "San Cristóbal de las Casas", "Comitán"],
        "Chihuahua": ["Ciudad Juárez", "Chihuahua", "Delicias", "Cuauhtémoc", "Hidalgo del Parral", "Nuevo Casas Grandes"],
        "Ciudad de México": ["Álvaro Obregón", "Benito Juárez", "Coyoacán", "Cuauhtémoc", "Gustavo A. Madero", "Iztapalapa", "Miguel Hidalgo", "Tlalpan"],
        "Coahuila": ["Saltillo", "Torreón", "Monclova", "Piedras Negras", "Acuña"],
        "Colima": ["Colima", "Manzanillo", "Tecomán", "Villa de Álvarez"],
        "Durango": ["Victoria de Durango", "Gómez Palacio", "Lerdo"],
        "Estado de México": ["Toluca", "Ecatepec", "Naucalpan", "Nezahualcóyotl", "Tlalnepantla", "Metepec"],
        "Guanajuato": ["León", "Irapuato", "Celaya", "Salamanca", "Guanajuato", "San Miguel de Allende"],
        "Guerrero": ["Acapulco", "Chilpancingo", "Iguala", "Zihuatanejo"],
        "Hidalgo": ["Pachuca", "Tulancingo", "Tula de Allende", "Mineral de la Reforma"],
        "Jalisco": ["Guadalajara", "Zapopan", "Tlaquepaque", "Tonalá", "Puerto Vallarta", "Tlajomulco"],
        "Michoacán": ["Morelia", "Uruapan", "Zamora", "Lázaro Cárdenas", "Pátzcuaro"],
        "Morelos": ["Cuernavaca", "Jiutepec", "Cuautla", "Temixco"],
        "Nayarit": ["Tepic", "Bahía de Banderas", "Santiago Ixcuintla"],
        "Nuevo León": ["Monterrey", "Guadalupe", "Apodaca", "San Nicolás de los Garza", "San Pedro Garza García", "Santa Catarina"],
        "Oaxaca": ["Oaxaca de Juárez", "San Juan Bautista Tuxtepec", "Salina Cruz", "Juchitán"],
        "Puebla": ["Puebla", "Tehuacán", "San Martín Texmelucan", "Atlixco", "Cholula"],
        "Querétaro": ["Santiago de Querétaro", "San Juan del Río", "Corregidora", "El Marqués"],
        "Quintana Roo": ["Cancún", "Playa del Carmen", "Chetumal", "Cozumel", "Tulum"],
        "San Luis Potosí": ["San Luis Potosí", "Soledad de Graciano Sánchez", "Ciudad Valles", "Matehuala"],
        "Sinaloa": ["Culiacán", "Mazatlán", "Los Mochis", "Guasave"],
        "Sonora": ["Hermosillo", "Ciudad Obregón", "Nogales", "San Luis Río Colorado", "Guaymas"],
        "Tabasco": ["Villahermosa", "Cárdenas", "Comalcalco", "Paraíso"],
        "Tamaulipas": ["Reynosa", "Matamoros", "Nuevo Laredo", "Tampico", "Ciudad Victoria"],
        "Tlaxcala": ["Tlaxcala", "Apizaco", "Huamantla"],
        "Veracruz": ["Veracruz", "Xalapa", "Coatzacoalcos", "Poza Rica", "Córdoba", "Orizaba"],
        "Yucatán": ["Mérida", "Valladolid", "Tizimín", "Progreso"],
        "Zacatecas": ["Zacatecas", "Fresnillo", "Guadalupe", "Jerez"]
    },
    "Estados Unidos": {
        "California": ["Los Ángeles", "San Diego", "San Francisco", "San José", "Sacramento"],
        "Texas": ["El Paso", "Houston", "Dallas", "Austin", "San Antonio", "McAllen"],
        "Nuevo México": ["Albuquerque", "Las Cruces", "Santa Fe", "Roswell"],
        "Arizona": ["Phoenix", "Tucson", "Mesa", "Scottsdale"],
        "Florida": ["Miami", "Orlando", "Tampa", "Jacksonville"],
        "Nueva York": ["Nueva York", "Búfalo", "Rochester", "Albany"],
        "Illinois": ["Chicago", "Aurora", "Naperville"]
    },
    "Colombia": {
        "Antioquia": ["Medellín", "Bello", "Itagüí", "Envigado"],
        "Bogotá D.C.": ["Bogotá"],
        "Valle del Cauca": ["Cali", "Buenaventura", "Palmira"],
        "Atlántico": ["Barranquilla", "Soledad"]
    },
    "España": {
        "Madrid": ["Madrid", "Alcalá de Henares", "Móstoles"],
        "Cataluña": ["Barcelona", "Hospitalet de Llobregat", "Badalona"],
        "Andalucía": ["Sevilla", "Málaga", "Granada", "Córdoba"]
    },
    "Argentina": {
        "Buenos Aires": ["Buenos Aires", "La Plata", "Mar del Plata"],
        "Córdoba": ["Córdoba", "Villa Carlos Paz", "Río Cuarto"],
        "Santa Fe": ["Rosario", "Santa Fe"]
    }
};

function inicializarSelectoresUbicacion() {
    const selectPais = document.getElementById("selectPais");
    const selectEstado = document.getElementById("selectEstado");
    const selectCiudad = document.getElementById("selectCiudad");

    if (!selectPais || !selectEstado || !selectCiudad) return;

    function cargarPaises() {
        selectPais.innerHTML = '<option value="">Selecciona un país</option>';
        Object.keys(ubicacionesData).forEach(pais => {
            const opt = document.createElement("option");
            opt.value = pais;
            opt.textContent = pais;
            selectPais.appendChild(opt);
        });
    }

    selectPais.addEventListener("change", () => {
        const pais = selectPais.value;
        selectEstado.innerHTML = '<option value="">Selecciona un estado</option>';
        selectCiudad.innerHTML = '<option value="">Selecciona primero un estado</option>';
        selectCiudad.disabled = true;

        if (pais && ubicacionesData[pais]) {
            selectEstado.disabled = false;
            Object.keys(ubicacionesData[pais]).forEach(estado => {
                const opt = document.createElement("option");
                opt.value = estado;
                opt.textContent = estado;
                selectEstado.appendChild(opt);
            });
        } else {
            selectEstado.disabled = true;
        }
    });

    selectEstado.addEventListener("change", () => {
        const pais = selectPais.value;
        const estado = selectEstado.value;
        selectCiudad.innerHTML = '<option value="">Selecciona una ciudad</option>';

        if (pais && estado && ubicacionesData[pais] && ubicacionesData[pais][estado]) {
            selectCiudad.disabled = false;
            ubicacionesData[pais][estado].forEach(ciudad => {
                const opt = document.createElement("option");
                opt.value = ciudad;
                opt.textContent = ciudad;
                selectCiudad.appendChild(opt);
            });
        } else {
            selectCiudad.disabled = true;
        }
    });

    cargarPaises();
}