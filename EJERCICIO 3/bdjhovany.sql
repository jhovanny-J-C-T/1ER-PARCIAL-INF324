USE [master]
GO
/****** Object:  Database [bdjhovany]    Script Date: 6/5/2024 00:26:22 ******/
CREATE DATABASE [bdjhovany]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'bdjhovany', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.MSSQLSERVER\MSSQL\DATA\bdjhovany.mdf' , SIZE = 5120KB , MAXSIZE = UNLIMITED, FILEGROWTH = 1024KB )
 LOG ON 
( NAME = N'bdjhovany_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL11.MSSQLSERVER\MSSQL\DATA\bdjhovany_log.ldf' , SIZE = 2048KB , MAXSIZE = 2048GB , FILEGROWTH = 10%)
GO
ALTER DATABASE [bdjhovany] SET COMPATIBILITY_LEVEL = 110
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [bdjhovany].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [bdjhovany] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [bdjhovany] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [bdjhovany] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [bdjhovany] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [bdjhovany] SET ARITHABORT OFF 
GO
ALTER DATABASE [bdjhovany] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [bdjhovany] SET AUTO_CREATE_STATISTICS ON 
GO
ALTER DATABASE [bdjhovany] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [bdjhovany] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [bdjhovany] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [bdjhovany] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [bdjhovany] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [bdjhovany] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [bdjhovany] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [bdjhovany] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [bdjhovany] SET  DISABLE_BROKER 
GO
ALTER DATABASE [bdjhovany] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [bdjhovany] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [bdjhovany] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [bdjhovany] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [bdjhovany] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [bdjhovany] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [bdjhovany] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [bdjhovany] SET RECOVERY FULL 
GO
ALTER DATABASE [bdjhovany] SET  MULTI_USER 
GO
ALTER DATABASE [bdjhovany] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [bdjhovany] SET DB_CHAINING OFF 
GO
ALTER DATABASE [bdjhovany] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [bdjhovany] SET TARGET_RECOVERY_TIME = 0 SECONDS 
GO
EXEC sys.sp_db_vardecimal_storage_format N'bdjhovany', N'ON'
GO
USE [bdjhovany]
GO
/****** Object:  Table [dbo].[cuentabancaria]    Script Date: 6/5/2024 00:26:23 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[cuentabancaria](
	[idcuenta] [int] NOT NULL,
	[persona_id] [int] NOT NULL,
	[tipo_cuenta] [varchar](50) NOT NULL,
	[saldo] [decimal](10, 2) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idcuenta] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[permisos]    Script Date: 6/5/2024 00:26:23 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[permisos](
	[id] [int] NOT NULL,
	[rol] [varchar](50) NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[persona]    Script Date: 6/5/2024 00:26:23 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[persona](
	[idpersona] [int] NOT NULL,
	[nombre] [varchar](255) NOT NULL,
	[apellido_paterno] [varchar](255) NOT NULL,
	[apellido_materno] [varchar](255) NULL,
	[ci] [varchar](20) NOT NULL,
	[telefono] [varchar](20) NULL,
	[fecha_nacimiento] [date] NOT NULL,
	[direccion] [varchar](255) NOT NULL,
	[departamento] [varchar](255) NOT NULL,
	[contraseña] [varchar](255) NOT NULL,
	[rol] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idpersona] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[transaccion]    Script Date: 6/5/2024 00:26:23 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[transaccion](
	[idtransaccion] [int] NOT NULL,
	[cuenta_origen_id] [int] NULL,
	[cuenta_destino_id] [int] NULL,
	[tipo_transaccion] [varchar](50) NOT NULL,
	[monto] [decimal](10, 2) NOT NULL,
	[fecha] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[idtransaccion] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
ALTER TABLE [dbo].[cuentabancaria] ADD  DEFAULT ((0.00)) FOR [saldo]
GO
ALTER TABLE [dbo].[persona] ADD  DEFAULT ((2)) FOR [rol]
GO
ALTER TABLE [dbo].[transaccion] ADD  DEFAULT (getdate()) FOR [fecha]
GO
ALTER TABLE [dbo].[cuentabancaria]  WITH CHECK ADD  CONSTRAINT [fk_persona] FOREIGN KEY([persona_id])
REFERENCES [dbo].[persona] ([idpersona])
GO
ALTER TABLE [dbo].[cuentabancaria] CHECK CONSTRAINT [fk_persona]
GO
ALTER TABLE [dbo].[persona]  WITH CHECK ADD  CONSTRAINT [fk_rol] FOREIGN KEY([rol])
REFERENCES [dbo].[permisos] ([id])
GO
ALTER TABLE [dbo].[persona] CHECK CONSTRAINT [fk_rol]
GO
ALTER TABLE [dbo].[transaccion]  WITH CHECK ADD  CONSTRAINT [fk_cuenta_destino] FOREIGN KEY([cuenta_destino_id])
REFERENCES [dbo].[cuentabancaria] ([idcuenta])
GO
ALTER TABLE [dbo].[transaccion] CHECK CONSTRAINT [fk_cuenta_destino]
GO
ALTER TABLE [dbo].[transaccion]  WITH CHECK ADD  CONSTRAINT [fk_cuenta_origen] FOREIGN KEY([cuenta_origen_id])
REFERENCES [dbo].[cuentabancaria] ([idcuenta])
GO
ALTER TABLE [dbo].[transaccion] CHECK CONSTRAINT [fk_cuenta_origen]
GO
USE [master]
GO
ALTER DATABASE [bdjhovany] SET  READ_WRITE 
GO
