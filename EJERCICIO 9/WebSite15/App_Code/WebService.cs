using System;
using System.Data;
using System.Data.SqlClient;
using System.Collections.Generic;
using System.Web;
using System.Web.Services;

/// <summary>
/// Descripción breve de WebService
/// </summary>
[WebService(Namespace = "http://tempuri.org/")]
[WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
public class WebService : System.Web.Services.WebService
{

    public WebService()
    {

        //Elimine la marca de comentario de la línea siguiente si utiliza los componentes diseñados 
        //InitializeComponent(); 
    }

    [WebMethod]
    public string HelloWorld()
    {
        return "Hola a todos";
    }

    [WebMethod]
    public int CambioPersona(int id, string nombre, string apellido_paterno, string apellido_materno, string ci, string telefono, DateTime fecha_nacimiento, string direccion, string departamento, string contraseña)
    {
        SqlConnection con = new SqlConnection();
        SqlCommand cmd = new SqlCommand();
        con.ConnectionString = "server=(local);user=jhovany;pwd=123456;database=bdjhovany";
        cmd.Connection = con;
        cmd.CommandText = "UPDATE persona SET nombre = @Nombre, apellido_paterno = @ApellidoPaterno, apellido_materno = @ApellidoMaterno, ci = @CI, telefono = @Telefono, fecha_nacimiento = @FechaNacimiento, direccion = @Direccion, departamento = @Departamento, contraseña = @Contraseña WHERE idpersona = @Id";
        cmd.Parameters.AddWithValue("@Nombre", nombre);
        cmd.Parameters.AddWithValue("@ApellidoPaterno", apellido_paterno);
        cmd.Parameters.AddWithValue("@ApellidoMaterno", apellido_materno);
        cmd.Parameters.AddWithValue("@CI", ci);
        cmd.Parameters.AddWithValue("@Telefono", telefono);
        cmd.Parameters.AddWithValue("@FechaNacimiento", fecha_nacimiento);
        cmd.Parameters.AddWithValue("@Direccion", direccion);
        cmd.Parameters.AddWithValue("@Departamento", departamento);
        cmd.Parameters.AddWithValue("@Contraseña", contraseña);
        cmd.Parameters.AddWithValue("@Id", id);
        con.Open();
        cmd.ExecuteNonQuery();
        con.Close();

        return 1;
    }

    [WebMethod]
    public int AltaPersona(int id, string nombre, string apellido_paterno, string apellido_materno, string ci, string telefono, DateTime fecha_nacimiento, string direccion, string departamento, string contraseña, int rol)
    {
        SqlConnection con = new SqlConnection();
        SqlCommand cmd = new SqlCommand();
        con.ConnectionString = "server=(local);user=jhovany;pwd=123456;database=bdjhovany";
        cmd.Connection = con;
        cmd.CommandText = "INSERT INTO persona (idpersona, nombre, apellido_paterno, apellido_materno, ci, telefono, fecha_nacimiento, direccion, departamento, contraseña, rol) VALUES (@Id, @Nombre, @ApellidoPaterno, @ApellidoMaterno, @CI, @Telefono, @FechaNacimiento, @Direccion, @Departamento, @Contraseña, @Rol)";
        cmd.Parameters.AddWithValue("@Id", id);
        cmd.Parameters.AddWithValue("@Nombre", nombre);
        cmd.Parameters.AddWithValue("@ApellidoPaterno", apellido_paterno);
        cmd.Parameters.AddWithValue("@ApellidoMaterno", apellido_materno);
        cmd.Parameters.AddWithValue("@CI", ci);
        cmd.Parameters.AddWithValue("@Telefono", telefono);
        cmd.Parameters.AddWithValue("@FechaNacimiento", fecha_nacimiento);
        cmd.Parameters.AddWithValue("@Direccion", direccion);
        cmd.Parameters.AddWithValue("@Departamento", departamento);
        cmd.Parameters.AddWithValue("@Contraseña", contraseña);
        cmd.Parameters.AddWithValue("@Rol", rol);
        con.Open();
        cmd.ExecuteNonQuery();
        con.Close();

        return 1;
    }

    [WebMethod]
    public int BajaPersona(int id)
    {
        SqlConnection con = new SqlConnection();
        SqlCommand cmd = new SqlCommand();
        con.ConnectionString = "server=(local);user=jhovany;pwd=123456;database=bdjhovany";
        cmd.Connection = con;
        cmd.CommandText = "DELETE FROM persona WHERE idpersona = @Id";
        cmd.Parameters.AddWithValue("@Id", id);
        con.Open();
        cmd.ExecuteNonQuery();
        con.Close();

        return 1;
    }



}
