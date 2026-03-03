function validarReserva(){

  const nombre = document.querySelector("[name=nombre]").value.trim();
  const email = document.querySelector("[name=email]").value.trim();
  const telefono = document.querySelector("[name=telefono]").value.trim();
  const habitacion = document.querySelector("[name=habitacion]").value.trim();
  const entrada = document.querySelector("[name=entrada]").value;
  const salida = document.querySelector("[name=salida]").value;

  if(!nombre || !email || !telefono || !habitacion || !entrada || !salida){
    alert("Todos los campos obligatorios");
    return false;
  }

  if(!email.includes("@")){
    alert("Email inválido");
    return false;
  }

  if(entrada >= salida){
    alert("La fecha de salida debe ser posterior");
    return false;
  }

  return true;
}