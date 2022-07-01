package metier;
import java.io.Serializable;
import java.util.Date;
import javax.xml.bind.annotation.XmlRootElement;
@XmlRootElement(name="compte")
public class Compte implements Serializable {

	private long Code;
	private double solde;
	private Date dateCreation;
	public long getCode() {
		return Code;
	}
	public void setCode(long code) {
		Code = code;
	}
	public double getSolde() {
		return solde;
	}
	public void setSolde(double solde) {
		this.solde = solde;
	}
	public Date getDateCreation() {
		return dateCreation;
	}
	public void setDateCreation(Date dateCreation) {
		this.dateCreation = dateCreation;
	}
	
	public Compte() {
		
	}
	public Compte(long code, double solde, Date dateCreation) {
		Code = code;
		this.solde = solde;
		this.dateCreation = dateCreation;
	}
	
}
