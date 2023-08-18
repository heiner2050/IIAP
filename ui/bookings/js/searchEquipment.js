function mostrarAlerta() {
  Swal.fire({
    title: '¿Qué equipo estás buscando?',
    text: 'Por favor escribe el nombre, marca o serial del equipo',
    input: 'text',
    showCancelButton: true,
    confirmButtonText: 'Buscar',
    cancelButtonText: 'Cancelar',
    preConfirm: async (query) => {
      try {
        const response = await fetch(`http://localhost/IIAP/api/bookings/searchEquipment.php?query=${query}`);
        if (!response.ok) {
          throw new Error(response.statusText);
        }
        return response.json();
      } catch (error) {
        Swal.showValidationMessage(`Error: ${error}`);
      }
    },
    allowOutsideClick: () => !Swal.isLoading()
  }).then(async (result) => {
    if (result.isConfirmed) {
      const data = result.value;
      if (data.success) {
        const equiposLista = document.getElementById('equipment-list');
        equiposLista.innerHTML = ''; // Limpiar contenido previo
        let cantidadEquipos = 0;

        // Implementación de paginación
        const equiposPorPagina = 6;
        const paginasTotales = Math.ceil(data.data.length / equiposPorPagina);
        let paginaActual = 1;

        const mostrarEquipos = (pagina) => {
          const inicio = (pagina - 1) * equiposPorPagina;
          const fin = inicio + equiposPorPagina;
          const equiposPagina = data.data.slice(inicio, fin);

          for (const equipo of equiposPagina) {
            const equipoDiv = document.createElement('div');
            equipoDiv.classList.add('card');
            equipoDiv.style.width = '18rem';
            equipoDiv.style.border = '1px solid #ccc';
            equipoDiv.style.borderRadius = '10px';
            equipoDiv.style.boxShadow = '0px 4px 6px rgba(0, 0, 0, 0.1)';
            equipoDiv.innerHTML = `
              <div class="card-inner" style="position: relative; overflow: hidden; border-radius: 10px;">
                <img class="card-img-top" src="${equipo.foto}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">${equipo.nombre}</h5>
                  <p class="card-text" style="margin-bottom: 15px;">La marca del equipo ${equipo.marca}.</p>
                  <ul class="list-unstyled">
                    <li>
                      <a href="http://localhost/IIAP/ui/bookings/reservationsDelete.php?id=${equipo.id_equipo}" style="color: #007BFF; text-decoration: none; display: inline-flex; align-items: center;">
                        <i class="fas fa-info-circle" style="margin-right: 5px;"></i> Detalles y préstamos
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            `;
            equiposLista.appendChild(equipoDiv);
            cantidadEquipos++;
          }
        };

        mostrarEquipos(paginaActual);

        // Implementación de botones de paginación
        const paginacionDiv = document.getElementById('pagination');
        for (let pagina = 1; pagina <= paginasTotales; pagina++) {
          const paginaBtn = document.createElement('button');
          paginaBtn.innerText = pagina;
          paginaBtn.classList.add('pagination-button');
          if (pagina === paginaActual) {
            paginaBtn.classList.add('active');
          }
          paginaBtn.addEventListener('click', () => {
            equiposLista.innerHTML = '';
            paginaActual = pagina;
            mostrarEquipos(paginaActual);
            // Actualizar clase "active" en botones de paginación
            const buttons = document.querySelectorAll('.pagination-button');
            buttons.forEach(button => button.classList.remove('active'));
            paginaBtn.classList.add('active');
          });
          paginacionDiv.appendChild(paginaBtn);
        }
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'No se encontraron equipos'
        });
      }
    }
  });
}