function cambiarColor(elemento, color) {
    elemento.style.backgroundColor = color;
}

function cargarEquiposPorCategoria(idCategoria, pagina = 1) {
    const equiposPorPagina = 10;
    const startIndex = (pagina - 1) * equiposPorPagina;

    fetch(`http://localhost/IIAP/api/bookings/getEquipmentByCategory.php?id=${idCategoria}&start=${startIndex}&limit=${equiposPorPagina}`)
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            var equiposLista = document.getElementById('equipment-list');
            equiposLista.innerHTML = '';
            var cantidadEquiposActivos = 0;
            console.log(data);
            data.equipos.forEach(function (equipo) {
                if (equipo.estado === 'Activo') {
                    var equipoDiv = document.createElement('div');
                    equipoDiv.classList.add('card');
                    equipoDiv.innerHTML = `
                    <div class="card" style="width: 18rem; border: 1px solid #ccc; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
                    <div class="card-inner" style="position: relative; overflow: hidden; border-radius: 10px;">
                      <img class="card-img-top" src="${equipo.foto}" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">${equipo.nombre}</h5>
                        <p class="card-text" style="margin-bottom: 15px;">La marca del equipo ${equipo.marca}.</p>
                        <ul class="list-unstyled">
                                <li>
                                    <a  href="http://localhost/IIAP/ui/bookings/detailsAndLoan_ui.php?id=${equipo.id_equipo}" style="color: #007BFF; text-decoration: none; display: inline-flex; align-items: center;">
                                        <i class="fas fa-info-circle" style="margin-right: 5px;"></i> Detalles y préstamos
                                    </a>
                                </li>
                            </ul>
                      </div>
                    </div>
                  </div>
                    `;
                    equiposLista.appendChild(equipoDiv);
                }
            });

            // Agregar botones de paginación
            var pagination = document.createElement('div');
            pagination.classList.add('pagination');

            var numPages = Math.ceil(data.total / equiposPorPagina);
            for (var i = 1; i <= numPages; i++) {
                var pageButton = document.createElement('button');
                pageButton.textContent = i;
                pageButton.addEventListener('click', function () {
                    cargarEquiposPorCategoria(idCategoria, i);
                });
                pagination.appendChild(pageButton);
            }

            equiposLista.appendChild(pagination);
        })
        .catch(function (error) {
            console.log('Error al obtener equipos: ' + error);
        });
}
