const v=document.querySelector("#distancia"),b=document.querySelector("#unidadDistancia"),h=document.querySelector("#categoria"),g=document.querySelector("#precio"),s=document.querySelector("#ramaAmbas"),d=document.querySelector("#ramaFemenil"),m=document.querySelector("#ramaVaronil");let x=document.querySelector("#clicks");const S=document.querySelector("#btn-add"),A=document.querySelector("#listaRamas"),k=document.querySelector("#empty");var D=1;S.addEventListener("click",t=>{t.preventDefault();let e=D++;const r=v.value,u=b.value,p=h.value.toUpperCase(),y=g.value,f=s.value,C=d.value,q=m.value;if(p!==""&&r!==""&&u!==""&&y!==""){const a=document.createElement("li"),c=document.createElement("input"),i=document.createElement("input"),l=document.createElement("input"),o=document.createElement("input"),n=document.createElement("input");c.setAttribute("class","bg-primary text-white "),i.setAttribute("class","bg-primary text-white "),l.setAttribute("class","bg-primary text-white "),o.setAttribute("class","bg-primary text-white "),n.setAttribute("class","bg-primary text-white "),c.setAttribute("readonly","readonly"),i.setAttribute("readonly","readonly"),l.setAttribute("readonly","readonly"),o.setAttribute("readonly","readonly"),n.setAttribute("readonly","readonly"),c.value=r+" ",c.name="distancia["+e+"]",i.value=u,i.name="unidadDistancia["+e+"]",l.value=p,l.name="categoria["+e+"]",o.value=y,o.name="precio["+e+"]",s.checked&&(n.value=f),d.checked&&(n.value=C),m.checked&&(n.value=q),n.name="rama["+e+"]",x.value="Has agregado "+e+" categorías",a.appendChild(l),a.appendChild(c),a.appendChild(i),a.appendChild(n),a.appendChild(o),a.appendChild(E()),A.appendChild(a),v.value="",b.value="",h.value="",g.value="",s.checked=!1,d.checked=!1,m.checked=!1}else x.value="Aún faltan campos por llenar."});function E(){const t=document.createElement("button");return t.setAttribute("class","mt-2 text-white bg-red-700 hover:bg-red-500 focus:ring-2 focus:outline-none focus:ring-blue-300 font-sm rounded-lg text-sm px-2.5 py-1"),t.id="delete",t.textContent="X",t.addEventListener("click",e=>{const r=e.target.parentElement;A.removeChild(r),document.querySelectorAll("li").length===0&&(k.style.display="block")}),t}
