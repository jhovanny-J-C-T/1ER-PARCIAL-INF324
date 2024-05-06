using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;

namespace WindowsFormsApplication3
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            localhost.WebService ws = new localhost.WebService();
            DateTime fechaNacimiento;
            DateTime.TryParse(textBox7.Text, out fechaNacimiento);
            ws.AltaPersona(Convert.ToInt16(textBox1.Text), textBox2.Text, textBox3.Text, textBox4.Text, textBox5.Text, textBox6.Text, fechaNacimiento, textBox8.Text, textBox9.Text, textBox10.Text, Convert.ToInt16(textBox11.Text));
        }

       
    }
}
 